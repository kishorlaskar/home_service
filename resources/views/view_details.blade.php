@extends('layouts.app') 

@section('content')
<style type="text/css">.backimage{background-image:url('../Asset/img/banner.jpg');width: 100%;height: 200px;}</style>
	<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6Lqq7Bmw0TcsWSAmrc7-TAc-I75b7_Q0&callback=initMap&sensor=false">
</script>
<div class="container">
    <div class="row">
		<div class="col-xs-12 ">
		 <div class="backimage"></div>
		</div>
		<div class="col-xs-12 ">
			 <!-- navigation bar -->
    <nav class="navbar custom-navber" style="background-color: #F2F3F4!important">
        <div class="container-fluid">
             <ul class="nav navbar-nav navbar-left">
             	<li><a href="#details"  style="color: black ">Details</a></li>
             	<li><a href="#reviews"  style="color: black ">Reviews</a></li>
             	<li><a href="#Service_Providers"  style="color: black ">Service Providers</a></li>
             </ul>
            
            
        </div>
    </nav>
		</div>
	</div>
		<div class="row">
			<div class="col-md-8">
				<div id="details">
				<h3>Service Details</h3><hr>
				<p>{!!$sub_category->service_details!!}</p><br>

				<h3>Payment</h3><hr>
				<p>{!!$sub_category->payment!!}</p><br>
                
                @if($sub_category->pricing>50)
				<h3>Pricing</h3><hr>
				<p>{{$sub_category->pricing}} TK</p><br>
				@endif

				<h3>Terms and Conditions</h3><hr>
				<p>{!!$sub_category->terms_and_conditions!!}</p><br>
                 </div>
                 <div id="reviews">
				<h3>Customer Reviews</h3><hr>
				{{--Review start--}}
				<div class="row" style="background-color: #e8e2e491">
					<div class="col-md-2">
						<img src="{{url('Asset/img/user_logo.png')}}" style="width: 50px;height: 50px;border-radius: 50%">
					</div>
					<div class="col-md-8">
						<h5>Customer</h5>
						<h6><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span></h6>
						<p>His Work is  too good.</p>
						<p>Fullfield by <a href="">Service Provider</a></p>
					</div>
					<div class="col-md-2">
						<p>12-03-2019</p>
					</div>
				</div><br>
				{{--Review end--}}
                </div>
                <div id="Service_Providers">
				<h3>Our Top Service Providers</h3><hr>
				<div class="row" >
					{{--provider start--}}
					<div class="col-md-6" >
						<div class="row" style="background-color: #e8e2e491;margin: 1px;">
					<div class="col-md-2">
						<img src="{{url('Asset/img/user_logo.png')}}" style="width: 50px;height: 50px;border-radius: 50%">
					</div>
					<div class="col-md-10">
						<h5>Service Provider</h5>
						<h6><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span></h6>
						<p>@2 jobs &nbsp;&nbsp;&nbsp;&nbsp;@5 resources</p>
					</div></div>
				</div>
				
					<div class="col-md-6" >
						<div class="row" style="background-color: #e8e2e491;margin: 1px;">
					<div class="col-md-2">
						<img src="{{url('Asset/img/user_logo.png')}}" style="width: 50px;height: 50px;border-radius: 50%">
					</div>
					<div class="col-md-10">
						<h5>Service Provider1</h5>
						<h6><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span><span>&#x2726;</span></h6>
						<p>@1 jobs &nbsp;&nbsp;&nbsp;&nbsp;@3 resources</p>
					</div></div>
				</div>
				<br>
				{{--provider end--}}
				</div>
				</div>

			</div>
			<div class="col-md-4">
			    <div class="col-md-12">
				<img src="{{url('storage/app/public/post_image/'.$sub_category->id.'.jpg')}}" style="width: 250px;height: 250px;">
				<h5>{{$sub_category->sub_category_name}}</h5>

				<a class="btn btn-primary" href="{{route('booking_service',['id'=>$sub_category->id])}}">Click For Booking</a>
				</div>
				<div class="col-md-12">
				    <div id="dvMap" style="width: 100%; height: 300px"></div>
				</div>
			</div>
		</div>
	</div>

	     <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(23.8103, 90.4125),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                var myLatlng = {lat: -25.363, lng: 131.044};
                  var marker = new google.maps.Marker({
                      position: {lat: e.latLng.lat(), lng: e.latLng.lng()},
                      map: map,
                    });
                    map.setCenter(marker.getPosition());
                alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            });
        }
    </script>

@endsection

