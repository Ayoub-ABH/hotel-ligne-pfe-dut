<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Room;
use App\Contact;
use App\Reservation;
use App\Location;
use App\HotelGallery;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function  index(Request $request){

        #change the statuts of hotels if they have no valiable room
        $hotels = Hotel::all();
        foreach ($hotels as $hotel) {
            $sum_va_rms = Room::select('va_rooms')->where('hotel_id',$hotel->id)->sum('va_rooms');
            if( $sum_va_rms == 0){
                Hotel::where('id',$hotel->id)
                    ->update(['statut'=> "draft"]);
            }
        }

        #filter hotels by price
        if($request->input('price')!=null)
        {
            $locations = Location::all();
            $price=$request->input('price');
            switch($price){
                case 200:
                        $Hotels = Hotel::orderBy('created_at', 'desc')
                        ->whereStatut('published')
                        ->where('price','<=',$price)
                        ->paginate();
                        break;

                case 400:
                        $Hotels = Hotel::orderBy('created_at', 'desc')
                        ->whereStatut('published')
                        ->where('price','>',200)
                        ->where('price','<=',$price)
                        ->paginate();
                        break;

                case 600:
                        $Hotels = Hotel::orderBy('created_at', 'desc')
                        ->whereStatut('published')
                        ->where('price','>=',$price)
                        ->paginate();
                        break;
            }
        }
        #return all hotels when (all) or (no request)
        elseif($request->input('location_name')==null || $request->input('location_name')=='all' )
        {
            $locations = Location::all();
            $Hotels = Hotel::orderBy('created_at', 'desc')
                                ->whereStatut('published')
                                ->paginate(3);
        }
        #filter hotels by location
        else
        {
            $location_name=$request->input('location_name');
            $persons_nb=$request->input('persons');
            $location_id=Location::select('id')->where('name','=',$location_name)->get();
            $locations = Location::all();
            $Hotels = Hotel::orderBy('created_at', 'desc')
                                    ->whereStatut('published')
                                    ->whereLocation_id($location_id[0]->id)
                                    ->where('max_persons','>=', $persons_nb)
                                    ->paginate();
        }

        return view('pages.hotel',['myHotels'=> $Hotels,'myLocations' => $locations]);
    }
    public function hotel_detail($id){

        #return the published hotels
        $Hotels = Hotel::orderBy('created_at', 'desc')
        ->whereStatut('published')
        ->whereId($id)
        ->get();

        #return the hotel gallery
        $HotelGalleries = HotelGallery::orderBy('created_at', 'desc')
        ->whereHotel_id($id)
        ->get();

        #return the valiable rooms
        $Rooms = Room::orderBy('created_at', 'desc')
        ->whereHotel_id($id)
        ->where('va_rooms','!=',0)
        ->get();

        #return the reservations
        $Reservations = Reservation::orderBy('created_at', 'desc')
                        ->whereHotel_id($id)
                        ->get();

        return view('pages.hotelDetail',[
                            'myHotels'=> $Hotels,
                            'myRooms'=> $Rooms,
                            'myReservations'=> $Reservations,
                            'myHotelGalleries' => $HotelGalleries
        ]);
    }


    public function store(Request $request){

        #save a message from contact
        $contact = new Contact();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->objet=$request->input('objet');
        $contact->message=$request->input('message');
        $contact->save();

        return back()->with('success','saved thank you');
    }
    public function reserve(Request $request){

        #save a reservation
        $reservation = new Reservation();
        $reservation->hotel_id=$request->input('hotel_id');
        $reservation->booker_id=$request->input('booker_id');
        $reservation->sr_nb=$request->input('single');
        $reservation->dr_nb=$request->input('double');
        $reservation->str_nb=$request->input('suite');
        $reservation->phone=$request->input('phone');
        $reservation->check_in=$request->input('check_in');
        $reservation->check_out=$request->input('check_out');
        $reservation->persons_nb=$request->input('persons_nb');
        $reservation->amount=$request->input('amount');
        $reservation->breakfasts=$request->input('breakfasts');
        $reservation->service_vip=$request->input('service_vip');
        $reservation->save();

        #update max_persons of the hotel after reservation
        $old_max_persons = Hotel::select('max_persons')->whereId($request->input('hotel_id'))->get();
        $new_max_persons = $old_max_persons[0]->max_persons - $request->input('persons_nb');
        Hotel::where('id',$request->input('hotel_id'))
                    ->update(['max_persons' => $new_max_persons]);
        $rooms=Room::select('type')->whereHotel_id($request->input('hotel_id'))->get();

        #update valliable rooms after a reservation
        foreach ($rooms as $room) {
            $va_nb=Room::select('va_rooms')
                        ->whereHotel_id($request->input('hotel_id'))
                        ->whereType($room->type)
                        ->get();
            $r_nb=$request->input($room->type);
            $resultat =$va_nb[0]->va_rooms - $r_nb;
            Room::where('hotel_id',$request->input('hotel_id'))
                    ->where('type',$room->type)
                    ->update(['va_rooms'=> $resultat]);
            }

        return back()->with('success','your reservation is saved thank you ');
    }
}
