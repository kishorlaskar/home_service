@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Sub Category</div>
                <div class="panel-body">
                 <div class="row">
                  <div class="col-md-12">
                    <a href="{{url('admin/add_sub_category')}}" class="btn btn-primary">Add New</a> <br><span id="error" style="color: red;"></span>
                  </div>
                  <br>
                   <div class="col-md-12" id="show_data">
                    
                     <table class="table">
                        <tr>
                          <th>ID</th>
                          <th>Category</th>
                          <th>Photo</th>
                          <th>Sub Category</th>
                          <th>Action</th>
                        </tr>
                        @php $i=1;$p=0;$add_data=''; @endphp
                        @if(count($categorys)>0)
                           @foreach($categorys as $category)
                              @php $p=0;$add_data=''; @endphp
                              @if(count($category->sub_category)>0)
                                @foreach($category->sub_category as $sub_category)
                                   @php 
                                   $imge=url('storage/app/public/post_image/'.$sub_category->id.'.jpg');
                                     $add_data .='<td> <img src="'.$imge.'" style="width:50px;height:50px;border-radius:50%">';
                            
                                    $add_data .=' </td><td>'.$sub_category->sub_category_name.'</td>
                                  <td><button class="btn btn-danger" id="'.$sub_category->id.'" onclick="delete_subcat(this.id)">Delete</button></td></tr><tr>' ;
                                  $p++;
                                    @endphp    
                                @endforeach
                              @else
                               @php $p=1;$add_data='<td></td><td></td><td></td>'; @endphp
                              @endif
                              <tr>  
                              <td rowspan="{{$p}}">{{$i}}</td>
                              <td rowspan="{{$p}}">{{$category->category_name}}</td>
                              @php echo $add_data; @endphp
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
      function delete_subcat(id){
           $.ajax({
            type: 'post',
            url: 'delete_subcategory',
            data: {
                     "_token" : $('meta[name=_token]').attr('content'), 
                      'subcat_id':id,
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