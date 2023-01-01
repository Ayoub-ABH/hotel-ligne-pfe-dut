<div class="SliderArea">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">

        <div class="carousel-inner">


        <!-- End book_container -->
        <div class="book-room bg-black text-white ">

            <div class="container">
                <form method="get" action="/hotel" >
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div >
                            <label > <i class="fas fa-map-marked-alt"></i>  location</label> <br>
                            <select name="location_name" id="location_name" class="form-control" required>
                                @foreach ($allmyLocations as $location)
                                <option>{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span></span>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    <div class="form-group ">
                        <label for="check_in"> <i class="far fa-calendar-check"></i>  check In</label>

                            <input type="date" class="form-control"  name="check_in" id="check_in" >
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    <div class="form-group ">
                        <label for="check_out" ><i class="fas fa-calendar-check"></i>  check Out</label>

                            <input type="date" class="form-control" name="check_out" id="check_out" >
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="" >
                            <label for="persons"> <i class="fas fa-users"></i>  persons</label>
                            <div >
                                <input type="number" class="form-control" name="persons" id="persons" min="1" value="1" step="1" >
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
        <!-- End book_container -->





        <div class="carousel-item active" style="background-image: url('{{asset('storage/general/slide-1.jpg')}}')" >
        </div>
        <div class="carousel-item " style="background-image: url('{{asset('storage/general/slide-2.jpg')}}')">
        </div>
        <div class="carousel-item" style="background-image: url('{{asset('storage/general/slide-3.jpg')}}')">
        </div>
        </div>

        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
    </div>
</div>

