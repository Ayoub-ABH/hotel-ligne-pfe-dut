<div class="hotel-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="hotel-aside">
                    <h4>LIST OF CITIES AND PRICE</h4>
                    <div class="card">
                        <div class="card-header">
                            Cities and their capacity
                        </div>
                        <ul class="list-group">

                            @foreach ($myLocations as $location)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$location->name}}
                                    <span class="badge badge-secondary badge-pill">{{$location->hotels_number}} hotels</span>
                                </li>
                            @endforeach

                        </ul>
                        <div class="card-header">
                            Filter By Price
                        </div>
                        <div class="list-group">


                            <form action="/hotel">
                            <button type="botton" class="list-group-item list-group-item-action" name="price" value="200"><i class="fas fa-less-than-equal "></i> 200 DH </button>
                            <button type="botton" class="list-group-item list-group-item-action" name="price" value="400"><i class="fas fa-greater-than"></i>  200 DH <i class="fas fa-less-than-equal"></i>  400 DH</button>
                            <button type="botton" class="list-group-item list-group-item-action" name="price" value="600"><i class="fas fa-greater-than-equal"></i>  600 DH</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 col-md-8 ">
                <h4 > {{$myHotels->total()}} HOTELS FOUND</h4>
                @foreach ($myHotels as $hotel)
                <div class="hotel-card">
                    <div class="card-content">
                        <div class="card text-left">
                            <a href="{{route('hoteldetail' , $hotel->id)}}"><img class="card-img-top" src="{{asset('storage/hotels/image/'.$hotel->image)}}" alt="hotel"></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{route('hoteldetail' , $hotel->id)}} ">{{$hotel->name}}</a></h4>
                                <p class="card-text">Facilities: {{$hotel->content}}</p>
                                <p class="card-text">form <span class="price">{{$hotel->price}}DH</span>  \night</p>
                                <p class="card-text"><i class="fas fa-map-marker-alt"></i>  {{$hotel->location->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="pagination">
                    {{$myHotels->links()}}
                </div>
            </div>







        </div>

    </div>
</div>


