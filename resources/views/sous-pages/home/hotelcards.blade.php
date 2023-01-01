<div class="hotelcards">
    <div class="container">
        <h3 class="pt-4">BEST HOTELS </h3>
        <div class="row">
            @foreach ($myHotels as $hotel)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <a href="{{route('hoteldetail' , $hotel->id)}} "><img class="card-img-top" src="{{asset('storage/hotels/image/'.$hotel->image)}}" alt="Card image cap"></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{route('hoteldetail' , $hotel->id)}} ">{{$hotel->name}}</a></h4>
                        <p class="card-text">from <span class="price">{{$hotel->price}}DH</span>  \night</p>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i>  {{$hotel->location->name}}</p>
                    </div>

                </div>
            </div>
            @endforeach
            </div>
    </div>
</div>

