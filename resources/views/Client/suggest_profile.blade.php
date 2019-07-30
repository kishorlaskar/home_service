@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.client_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Nearest Service Provider</div>
                <div class="panel-body">
                 <div class="row">
                 	@if(count($profiles)>0)
                 	 @foreach($profiles as $profile)
                 	<div class="col-md-6"  style="background-color: aliceblue;">
                 		<div class="col-md-3">
                 			 @if($profile->photo !=NULL)
                      <img src="{{url('public/storage/provider_image/'.$profile->id.'.jpg')}}" style="border-radius: 50%;width: 100%">
                      @else
                      <img src="{{url('Asset/img/user_logo.png')}}" style="border-radius: 50%;width: 100%">
                       @endif
                 		</div>
                 		<div class="col-md-6">
                 			<h4>{{$profile->name}}</h4>
                 			<p>{{$profile->address}}</p>
                 			<p>{{$profile->phone}}</p>
                 		</div>
                 		<div class="col-md-3">
                 			@php $count =(count($profile->booking)) == 0 ?1:count($profile->booking);$i=0; @endphp
                 			@if(count($profile->booking)>0)
                 			@foreach($profile->booking as $rank)
                              @php $i=$i+$rank->rank; @endphp
                            @endforeach
                            @endif

                 			<p>
                 			@for($a=0;$a<$i/$count;$a++)
                 			 <span>&#x2726;</span>
                 			@endfor
                 			@for($a;$a<5;$a++)
                 			 <span>&#x2727;</span>
                 			@endfor</p>
                 			<a href="{{route('set_datetime',["id"=>$profile->id,"sub_category_id"=>$sub_category_id])}}" class="btn btn-primary">Hire Me</a>
                 		</div>
                 	</div>
                 	@endforeach
                 	
                 	@endif
                 </div>
                </div>
            </div>

          </div>
    </div>
  </div>
@endsection