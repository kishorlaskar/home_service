@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>
                <div class="panel-body">
                 <div class="row">
                   <div class="col-md-6">
                     <form >
                      <div class="col-md-9">
                       <input type="text" id="category_id" name="category_name" class="form-control" required="true" placeholder="Enter category name">
                       <span id="error" style="color: red;"></span>
                       </div>
                       <div class="col-md-3">
                         <input type="submit" class="btn btn-primary" value="Add">
                       </div>
                     </form>
                   </div>
                   <div class="col-md-6" id="show_data">
                     <table class="table">
                        <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th>Action</th>
                        </tr>
                        @php $i=1; @endphp
                        @if(count($categorys)>0)
                           @foreach($categorys as $category)
                            <tr>
                              <td>{{$i}}</td>
                              <td>{{$category->category_name}}</td>
                              <td><button class="btn btn-danger" id="{{$category->id}}" onclick="delete_cat(this.id)">Delete</button></td>
                            </tr>
                          @php $i++; @endphp
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