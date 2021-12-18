@extends('front.layouts.layout')
@section('content')
	<section class="about-us-section">
    	<div class="auto-container">
            <div class="row clearfix">
                <!--Content Column-->
                <div class="column content-column pull-right col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <h2>About Valencia</h2>
                        <div class="text">The weather started getting rough the tiny ship was toss if not for the minow would be lost make all our dreams come true for me and you these men to be promptly escaped from a maximum security stockade.</div>
                        <a href="{{ url('/booking')}}" class="theme-btn btn-style-three">Book A Trip</a>
                    </div>
                </div>
						
                <!--Map Column-->
                <div class="column map-column pull-left col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <figure class="map-image"><img src="{{ URL::asset('/assets/front/images/resource/locations-map.png') }} " alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection