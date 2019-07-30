@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.client_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Account Information</div>
                <div class="panel-body">
                  <div class="row">
                      <form method="post" action="{{route('edit_customer_info')}}" enctype=multipart/form-data>
                                {{csrf_field()}}
                    <div class="col-md-7">
                        <a class="btn btn-primary" onclick="edit_account()">Edit</a>
                      <table class="table" id="show_data">
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
                          <th>Phone Number : </th>
                          <td>{{$client->phone}}</td>
                        </tr>
                        <tr><td></td><td></td></tr>

                      </table>
                      
                        <table class="table" id="update_data" style="display:none;">
                            
                        <tr>
                          <th>Name : </th>
                          <td><input type="text" class="form-control" value="{{$client->name}}" name="name" required></td>
                        </tr>
                        <tr>
                          <th>Address : </th>
                          <td><input type="text" class="form-control" value="{{$client->address}}" name="address" required></td>
                        </tr>
                        <tr>
                          <th>Phone Number : </th>
                          <td><input type="text" class="form-control" value="{{$client->phone}}" name="phone" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a class="btn btn-danger" onclick="back()">Cancle</a>&nbsp; &nbsp;<input type="submit" class="btn btn-success" value="Update"></td>
                        </tr>
                        <tr><td></td><td></td></tr>
                        
                      </table>
                    </div>
                    <div class="col-md-5">
                      @if($client->photo !=NULL)
                      <img src="{{url('storage/app/public/client_image/'.$client->id.'.jpg')}}" style="height:200px;width: 200px;" id="image">
                      @else
                      <img src="{{url('Asset/img/user_logo.png')}}" style="height:200px;width: 200px;" id="image">
                       @endif

                      <div id="up_image" style="display:none;"> <input  type="file" name="provider_image" class="form-control" style="width:40%" onchange="setImage(this)"></div>
                    </div>
                     </form>
                    <div class="col-md-6">
                      <form method="post" action="">
                        <label >Current Password</label>
                        <input type="text" name="current_password" class="form-control">
                        <label >New Password</label>
                        <input type="text" name="new_password" class="form-control"><br>
                        <input type="submit" class="btn btn-primary" value="Change Password">
                      </form>
                    </div>
                  </div>
                </div>
            </div>

          </div>
    </div>
  </div>
  <script>
      function edit_account(){
          document.getElementById('show_data').style.display='none';
          document.getElementById('update_data').style.display='block';
          document.getElementById('up_image').style.display='block';
      }
       function back(){
          document.getElementById('show_data').style.display='block';
          document.getElementById('update_data').style.display='none';
           document.getElementById('up_image').style.display='none';
      }
        function setImage(input){
     if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function(e) {
          $('#image').attr('src', e.target.result);
          }
         reader.readAsDataURL(input.files[0]);
        }
       }
  </script>
@endsection