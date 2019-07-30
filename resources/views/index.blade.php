@extends('layouts.app') 

@section('content')
<link rel="stylesheet" type="text/css" href="{{'Asset/css/side_nav.css'}}">
<div class="container">
    <div class="row">
		<div class="col-xs-12">
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs"> @php $i=0;@endphp
					@foreach($categories as $category)
					  <li class="{{ $i == 0 ? "tab active":"tab"}}"><a href="#{{$i}}" data-toggle="tab">{{$category->category_name}}</a></li>
					 @php  $i++;@endphp
					@endforeach
				</ul>
				<div class="tab-content">@php $i=0;@endphp
					@foreach($categories as $category)
					<div class="tab-pane {{ $i == 0 ? "active":"" }}" id="{{$i}}">                
							<h4>Sub-Category of {{$category->category_name}}</h4>
							<div class="row">
							@if(count($category->sub_category) >0)
								@foreach($category->sub_category as $sub_category)
								<div class="col-md-3" style="padding: 10px;background-color: #F1F2F2"><a href="{{route('view_details',['id'=>$sub_category->id])}}">{{$sub_category->sub_category_name}}</a></div>
								@endforeach
							@endif
							</div>            
					</div>
					  @php  $i++;@endphp
					@endforeach
				</div>
			</div>
			<!-- /tabs -->
		</div>
	</div>
</div>
<hr>
<div class="container">
	@foreach($random_categories as $random_category )
	<div class="row">
		<div class="col-xs-12"><h4>{{$random_category->category_name}}</h4><hr></div>
		@if(count($random_category->sub_category)>0)
		@foreach($random_category->sub_category as $sub_category)
		<div class="col-xs-3">
			<div style="width: 90%">
				<a href="{{route('view_details',['id'=>$sub_category->id])}}">
			<img src="{{url('storage/app/public/post_image/'.$sub_category->id.'.jpg')}}" style="width: 100%;height: 150px;">
			<p style="text-align: center;">{{$sub_category->sub_category_name}}</p></a>
			</div>
		</div>
		@endforeach
		@endif
	</div>
  @endforeach
</div>
@endsection

