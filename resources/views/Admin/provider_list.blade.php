@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Service Provider List</div>
                <div class="panel-body">
                 <div class="row">
                   <div class="col-md-12">
                    <a href="" class="btn btn-primary">Add New</a>
                   </div> 
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
                        @if(count($providers)>0)
                           @foreach($providers as $provider)
                            <tr>
                              <td>{{$i}}</td>
                              <td>{{$provider->name}}</td>
                              <td>{{$provider->email}}</td>
                              <td>{{$provider->phone}}</td>
                              <td><button class="btn btn-danger" id="{{$provider->id}}" onclick="delete_cat(this.id)">Delete</button> &nbsp;<button class="btn btn-primary"> View </button> &nbsp;<button class="btn btn-success"> Edit</button></td>
                            </tr>
                          @php $i++; @endphp
                          @endforeach
                        @endif
                     </table>
                     {{$providers->links()}}
                   </div>
                 </div>
                </div>
            </div>

          </div>
    </div>
  </div>
 <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();
          $.ajax({
            type: 'post',
            url: 'main_category',
            data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      'category':$('#category_id').val(),
                    }, 
            success: function (msg) {
              if(msg != '111'){
                $('#error').html('');
                $('#category_id').val('');
                $('#show_data').html(msg);
              }
              else{
                $('#error').html('This category already exist !!');
              }
            }
          });

        });

      });

      function delete_cat(id){
           $.ajax({
            type: 'post',
            url: 'delete_category',
            data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      'cat_id':id,
                    }, 
            success: function (msg) {
              if(msg != '111'){
                $('#error').html('');
                $('#show_data').html(msg);
              }
              else{
                $('#error').html('There is an error..Please try again!!');
              }
            }
          });
      }
    </script>
@endsection