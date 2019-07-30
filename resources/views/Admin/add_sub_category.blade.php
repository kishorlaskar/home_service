@extends('layouts.app')

@section('content')
<style type="text/css">
  .image_up:hover {
  -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1); 
}
</style>
<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Add Sub-Category</div>
                <div class="panel-body">
                 <div class="row">
                   <div class="col-md-12">
                     <form action="{{route('add_sub_category')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <table style="width: 70%;">
                        <tr>
                          <td>Category : </td>
                          <td><select class="form-control" name="category_id" required>
                              @if(count($categorys)>0)
                           @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endforeach
                           @endif
                          </select><br></td>
                        </tr>
                        <tr>
                          <td>Sub-Category : </td>
                          <td><input type="text" name="sub_category_name" class="form-control" required><br></td>
                        </tr>
                        <tr>
                          <td>Service Details :</td>
                          <td><textarea name="service_details" class="form-control" cols="50" rows="15" required></textarea><br></td>
                        </tr>
                        <tr>
                          <td>Price : </td>
                          <td><input type="number" min="50" name="pricing" class="form-control" ><br></td>
                        </tr>
                        <tr>
                          <td>Payment : </td>
                          <td><textarea name="payment" class="form-control" cols="50" rows="15" required></textarea><br></td>
                        </tr>
                        <tr>
                          <td>Terms and Conditions :</td>
                          <td><textarea name="terms_and_conditions" class="form-control" cols="50" rows="15" value="null"></textarea><br></td>
                        </tr>
                        <tr>
                          <td>Sub-Category Image : </td>
                          <td>
                            <div style="width:190px;height: 190px; background-color: #95959a;float: left;margin-left: 10px;position: relative; overflow: hidden;" class="image_up">
            <img src="{{url('Asset/img/Placeholder.jpg')}}" id="image" style="width: 100%;height: 100%">
          <input type="file" name="photo"  style="font-size: 162px;opacity: 0;margin-top: -219px;" required="true" onchange="setImage(this,)">
          </div>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><br><input type="submit" class="btn btn-primary" value="Add"></td>
                        </tr>
                      </table>
                     </form>
                   </div>
                 </div>
                </div>
            </div>

          </div>
    </div>
  </div>
  <script type="text/javascript">
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