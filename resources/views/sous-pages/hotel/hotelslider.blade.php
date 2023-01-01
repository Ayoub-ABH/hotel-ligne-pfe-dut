<div class="hotel-slider">
    <div class="slider" style="background-image: url('{{asset('storage/hotels/slide/h-slide-1.jpg')}}')">
    <h4 class="title">welcome search hotel!!</h4>

    </div>
    <div class="container ">
        <div class="book-hotel">
            <form method="get" action="/hotel" >
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div >
                        <label ><i class="fas fa-map-marked-alt"></i>  location</label> <br>
                        <select name="location_name" id="location_name" class="form-control">
                            <option>all</option>
                            @foreach ($myLocations as $location)
                                <option>{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span></span>
                </div>
                <div class="col-lg-3 col-md-6">
                <div class="form-group ">
                    <label for="adults"> <i class="far fa-calendar-check"></i>  check In</label>

                        <input type="date" class="form-control"  name="check_in" id="check_in" >
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                <div class="form-group ">
                    <label for="adults" ><i class="fas fa-calendar-check"></i>   check Out</label>

                        <input type="date" class="form-control" name="check_out" id="check_out" >
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="" >
                        <label for="persons"><i class="fas fa-users"></i>  persons</label>
                        <div >
                            <input type="number" class="form-control" name="persons" id="persons" value="1" min="1" step="1">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <button type="submit" class="btn btn-primary">check avaliabilite</button>
                </div>
            </div>
        </form>

    </div>

    </div>
    </div>
</div>

