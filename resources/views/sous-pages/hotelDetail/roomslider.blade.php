<div class="room-slider shadow-sm">
    @foreach ($myHotels as $hotel)
    <div class="slider" style="background-image: url('{{asset('storage/hotels/slide/'.$hotel->slide_image)}}')">
        <h4 class="title">reserve your set</h4>
    </div>
    @endforeach
</div>
            @if(session('success'))
            <div class="row">
                <div class="col-md-6 mx-auto mt-3 text-center">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
            </div>
            @endif


