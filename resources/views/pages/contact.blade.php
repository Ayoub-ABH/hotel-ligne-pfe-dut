@extends('master')

@section('content')
<div class="contact">

    <div class="slider" style="background-image: url('{{asset('storage/general/slide-1.jpg')}}')">
        <h4 class="title">We'd love to hear from you</h4>
    </div>

    <div class="contact-form">

        <div class="container">
            @if(session('success'))
            <div class="row">
                <div class="col-md-6 mx-auto mt-3 text-center">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
            </div>
            @endif
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">HOTEL LIGNE</h4>
                        </div>
                        <div class="card-body">

                            <h6 class="card-title text-blue">EMAIL:</h6>
                            <p class="card-text ">{{setting('contact.email')}}</p>
                            <h6 class="card-title text-blue ">PHONE: </h6>
                               <p>{{setting('contact.phone')}}</p>
                            <h6 class="card-title text-blue">LOCATION:</h6>
                            <p class="card-text ">
                                <iframe src="{{setting('contact.location')}}" width="500" height="354" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </p>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Contact Us</h4>
                            <p >Send us a message and we'll respond as soon as possible</p>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/contact')}}" method="post">
                                @csrf

                                <div class="form-group ">
                                    <label for="name" >Name:</label>
                                    <input id="name" type="text" class="form-control " name="name"  required >
                                </div>
                                <div class="form-group ">
                                    <label for="email" >Email:</label>
                                    <input id="email" type="email" class="form-control " name="email"  required >
                                </div>

                                <div class="form-group ">
                                    <label for="objet" >Objet:</label>
                                    <input id="objet" type="text" class="form-control "  name="objet" required>
                                </div>

                                <div class="form-group ">
                                    <label for="message" >Message:</label>
                                    <textarea class="form-control" name="message" id="message" cols="20" rows="5"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Send</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection


