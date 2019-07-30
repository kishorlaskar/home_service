@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{$client->name}} -> Information</div>
                <div class="panel-body">
                 <div class="row">
                  <span style="color: red" id="error"></span>
                   <div class="col-md-12" id="show_data">
                    <p style="text-align: center;">
                      @if($client->photo)
                      <img src="{{url('storage/app/public/client_image/'.$client->id.'.jpg')}}" style="width: 150px;height: 150px;border-radius: 50%;" alt="Client image..">
                      @else
                      <img src="{{url('Asset/img/user_logo.png')}}" style="width: 150px;height: 150px;border-radius: 50%;" alt="Client image..">
                      @endif
                    </p>
                     <table class="table" >
                        <tr>
                          <th>Name : </th>
                          <td>{{$client->name}}</td>
                        </tr>

                        <tr>
                          <th>Email : </th>
                          <td>{{$client->email}}</td>
                        </tr>

                        <tr>
                          <th>Address : </th>
                          <td>{{$client->address}}</td>
                        </tr>
                        <tr>
                          <th>Phone : </th>
                          <td>{{$client->phone}}</td>
                        </tr>
                     </table>
                     <h2>Client Booking....</h2>
                     <table class="table">
                       <tr>
                         <th>Photo</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Sub Category</th>
                         <th>Rank</th>
                         <th>Comment</th>
                         <th>Booking Date</th>
                       </tr>
                       @if(count($client->booking)>0)
                         @foreach($client->booking as $booking)
                         <tr>
                           <td>
                             @if($booking->service_provider->photo)
                             <img src="{{url('storage/app/public/provider_image/'.$booking->service_provider_id.'.jpg')}}" style="width: 50px;height: 50px;border-radius: 50%;">
                             @else
                              <img src="{{url('Asset/img/user_logo.png')}}" style="width: 50px;height: 50px;border-radius: 50%;" alt="Provider image">
                             @endif
                           </td>
                           <td>{{$booking->service_provider->name}}</td>
                           <td>{{$booking->service_provider->email}}</td>
                           <td>{{$booking->service_provider->phone}}</td>
                           <td>{{$booking->sub_category->sub_category_name}}</td>
                           <td>{{$booking->rank}}</td>
                           <td>{{$booking->comment}}</td>
                           <td>{{$booking->created_at}}</td>
                         </tr>
                         @endforeach
                       @endif
                     </table>
                   </div>
                 </div>
                </div>
            </div>

          </div>
    </div>
  </div>
@endsection