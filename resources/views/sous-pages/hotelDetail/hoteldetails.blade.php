<div class="hotel-details">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 ">
                @foreach ($myHotels as $hotel)

                <div class="card-content">
                    <div class="card text-left border-primary">
                        <div class="card-header">
                            <h4> {{$hotel->name}}</h4>
                        </div>
                        <div class="card-body">

                                <p class="card-text">form <span class="price">{{$hotel->price}}DH</span>  \night</p>
                                <p class="card-text"> <i class="fas fa-map-marker-alt"></i>  {{$hotel->location->name}}</p>
                        </div>
                        <div id="carouselId" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="carousel-item @if($i==0) active @endif">
                                        <img class="image" src="{{asset('storage/hotels/gallery').'/'.$myHotelGalleries[$i]->image}}" alt="First slide">
                                    </div>
                                @endfor
                            </div>

                            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <br>
                <div class="card border-primary ">
                    <div class="card-body">{!! $hotel->descrption !!}</div>
                </div>
                <br>

            </div>

            <div class="col-lg-4 col-md-4">
                <div class="hotel-aside">
                    <div class="card">
                        <div class="card-header">
                            your reservations
                        </div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Attribut</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($myReservations as $reservation)
                                @if(Auth::check() &&(Auth::user()->id == $reservation->booker_id))
                                    <tr>
                                        <td scope="row">reservation identifire:</td>
                                        <td class="value">{{$reservation->id}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">check-in</td>
                                        <td class="value">{{$reservation->check_in}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">check-out </td>
                                        <td class="value">{{$reservation->check_out}}</td>
                                    </tr>
                                    @if($reservation->sr_nb!= 0)
                                    <tr>
                                        <td scope="row">single rooms number</td>
                                        <td class="value">{{$reservation->sr_nb}}</td>
                                    </tr>
                                    @endif

                                    @if($reservation->str_nb!= 0)
                                    <tr>
                                        <td scope="row">suite rooms number</td>
                                        <td class="value">{{$reservation->str_nb}}</td>
                                    </tr>
                                    @endif
                                    @if($reservation->dr_nb!= 0)
                                    <tr>
                                        <td scope="row">double rooms number</td>
                                        <td class="value">{{$reservation->dr_nb}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td scope="row">hotel</td>
                                        <td class="value">{{$reservation->hotel_id}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">total amount</td>
                                        <td class="value">{{$reservation->amount}} DH</td>
                                    </tr>
                                    @if($reservation->service_vip!= null)
                                    <tr>
                                        <td scope="row">service_vip</td>
                                        <td class="value">{{$reservation->service_vip}}</td>
                                    </tr>
                                    @endif
                                    @if($reservation->breakfasts!= null)
                                    <tr>
                                        <td scope="row">breakfasts</td>
                                        <td class="value">{{$reservation->breakfasts}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td scope="row">statut</td>
                                        <td ><span class="value-statut">{{$reservation->statut}}</span> </td>
                                    </tr>

                                @endif
                            @endforeach
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>




        </div>

    </div>
</div>


