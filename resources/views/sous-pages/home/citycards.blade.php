<div class="citycards">
    <div class="container">
        <h3>BEST HOTEL CITIES</h3>
        <p>welcome to MOROCCO hotel cities enjoy!</p>
        <div class="row">

            @foreach ($myLocations as $location)
            <div class="col-lg-4 col-md-6">
                <div class="card bg-dark text-white text-center">
                <img class="card-img" src="{{asset('storage/hotels/locations/'. $location->image)}}" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title ">{{$location->name}}</h5>
                    <p class="card-text ">{!! $location->content !!}</p>

                    <a href="/hotel" class="hotel-link"> {{$location->hotels_number}} hotels</a>
                </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


