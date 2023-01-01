<div class="room-list">
    <div class="container">

        @foreach ($myHotels as $hotel)
        <form action="{{url("/hotel").'/'.$hotel->id}}" method="post">
        @endforeach
            @csrf
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="card border-primary ">
                        <div class="card-header">
                            <h4>Avaliable Rooms</h4>
                            @if(!(Auth::check()))
                            <p>you must <a href="/login">login</a>  to do a reservation </p>
                            @endif
                        </div>
                    </div>
                    @foreach ($myRooms as $room)
                        <div class="card border-primary">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 ">
                                    <img class="card-img-top" src="{{asset('storage/hotels/rooms/'.$room->image)}}" alt="image room" >
                                </div>
                                <div class="col-lg-6 col-md-6 ">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$room->type}} ROOM</h4>
                                        <p class="card-text">{!! $room->content !!}</p>
                                        <p class="card-text"><span class="price" id="{{$room->type}}_price">{{$room->price}}DH</span> /night</p>
                                        @if (Auth::check() && Auth::user()->role_id==2)
                                        <label for="rooms">number of rooms you want:</label>
                                        <input type="number" class="form-control" value="0" max="{{$room->va_rooms}}"
                                                min="0" step="1" name="{{$room->type}}" id="{{$room->type}}" onchange="cal_amount() ">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>




            @if(Auth::check() && Auth::user()->role_id==2)
            <div class="row">
                <div class="col-md-8">
                    <div class="reservation">
                    <div class="card  border-primary">
                        <div class="card-header"> <h4>reserve your set</h4>  </div>
                            <div class="card-body">

                                <p class="lead">

                                </p>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Number Phone </label>
                                    <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control " name="phone" value=""  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="persons_nb" class="col-md-4 col-form-label text-md-right">Persons</label>
                                    <div class="col-md-6">
                                        @foreach ($myHotels as $hotel)
                                                <input  id="persons_nb" type="number" class="form-control "
                                                        value="1" step="1" min="1" max="{{$hotel->max_persons}}" name="persons_nb"
                                                        onchange="cal_amount() ">
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="check_in" class="col-md-4 col-form-label text-md-right">Check In</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control"  name="check_in" id="check_in">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="check_out" class="col-md-4 col-form-label text-md-right">Check Out</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="check_out" id="check_out" >
                                    </div>
                                </div>

                                @foreach ($myHotels as $hotel)
                                <label for="breakfasts" class="col-md-4 col-form-label text-md-right" >Breakfasts </label>
                                <input type="checkbox" name="breakfasts" class="in-brk" id="breakfasts" value="off" onclick="change_bk()" >
                                <span id="breakfast_price"class="ml-10">{{$hotel->breakfast_price}} DH</span>

                                <label for="service_vip" class="col-md-4 col-form-label text-md-right" >Service VIP </label>
                                <input type="checkbox" name="service_vip" class="in-brk" id="service_vip" value="off" onclick="change_sv()" >
                                <span id="service_vip_price"class="ml-10">{{$hotel->service_vip_price}} DH</span>

                                <input type="hidden" name="hotel_id" id="hotel_id" value="{{$hotel->id}}">
                                @endforeach

                                <label for="aff_amount" class="col-md-4 text-md-right" > Amount</label>
                                <span name="aff_amount" id="aff_amount" class="ml-11"></span>

                                <input type="hidden" name="booker_id" id="booker_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="amount" id="amount" >

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button  type="submit" class="btn btn-primary" >book now</button>
                                    </div>
                                </div>

                            </div>

                    </div>
                    </div>
                </div>
            </div>
            @endif

        </form>

            @foreach ($myHotels as $hotel)
                <div class="row">
                    <div class="col-md-8 mt-4 mb-4">
                        <div class="card border-primary">
                            <div class="card-header"><h4>location</h4></div>
                            <div class="card-body">
                                <iframe  src="{{$hotel->location->map_link}}" width="680"
                                        height="400" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>



