@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.client_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Set Date and Time For Get Service</div>
                <div class="panel-body">
                 <div class="row">
                 <form method="post" action="{{route('submit_datetime')}}"> 
                 	{{ csrf_field() }}
                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" required autofocus><br>
                            </div><br>
                        </div>

                          <div class="form-group">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control" name="time" required ><br>
                            </div><br>
                        </div>

                 	<input type="hidden" name="provider_id" value="{{$provider_id}}">
                 	<input type="hidden" name="sub_category_id" value="{{$sub_category_id}}">
                 	<div class="col-md-1 col-md-offset-4">
                       <input type="submit" class="btn btn-primary" value="Finish" >
                    </div>
                 </form>
                 </div>
                </div>
            </div>

          </div>
    </div>
  </div>
@endsection