@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Client List</div>
                <div class="panel-body">
                 <div class="row">
                  <span style="color: red" id="error"></span>
                   <div class="col-md-12" id="show_data">
                     <table class="table" >
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Action</th>
                        </tr>
                        @php $i=1; @endphp
                        @if(count($clients)>0)
                           @foreach($clients as $client)
                            <tr>
                              <td>{{$i}}</td>
                              <td>{{$client->name}}</td>
                              <td>{{$client->email}}</td>
                              <td>{{$client->phone}}</td>
                              <td><a class="btn btn-danger"  onclick="event.preventDefault();document.getElementById('delete-form{{$client->id}}').submit();">Delete</a> &nbsp;<a class="btn btn-primary" href="{{route('view_client_info',['id'=>$client->id])}}"> View </a></td>
                            </tr>
                          @php $i++; @endphp
                           <form id="delete-form{{$client->id}}" action="{{ route('delete_client') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                     <input type="hidden" name="client_id" value="{{$client->id}}">
                      </form>
                          @endforeach
                        @endif
                     </table>

                     {{$clients->links()}}
                   </div>
                 </div>
                </div>
            </div>

          </div>
    </div>
  </div>
@endsection