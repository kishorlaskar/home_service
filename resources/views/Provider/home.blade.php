@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.provider_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Service Provider</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                       <h3>Your Average Rank</h3>

                       @php $count =(count($bookings)) == 0 ?1:count($bookings);$i=0; @endphp
                      @if(count($bookings)>0)
                      @foreach($bookings as $rank)
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


                    </div>
                    <div class="col-md-12">
                      <h3>Service List</h3>
                      <table class="table">
                        <tr>
                          <th>SL</th>
                          <th>Client</th>
                          <th>Address</th>
                          <th>Booking Time</th>
                          <th>Sub-Category</th>
                          <th>Status</th>
                          <th>More</th>
                        </tr>
                      @php $i=1; @endphp
                      @if(count($bookings)>0)
                        @foreach($bookings as $booking)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$booking->client->name}}</td>
                            <td>{{$booking->client->address}}</td>
                            <td>{{$booking->created_at}}</td>
                            <td>{{$booking->sub_category->sub_category_name}}</td>
                            <td>{!!$booking->status!!}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-todo='{"id":"{{$booking->id}}","category_name":"{{$booking->sub_category->category->category_name}}","rank":"{{$booking->rank}}","comment":"{{$booking->comment}}"}'>More</button></td>
                          </tr>
                          @php $i++; @endphp
                        @endforeach
                      @endif
                      </table>
                    </div>

                    <div class="col-md-12">
                      <div id="providing_services">
                      <h3>Your Providing Services</h3>
                      <table class="table">
                        <tr>
                          <th>SL</th>
                          <th>Category</th>
                          <th>Sub-Category</th>
                          <th>Resources</th>
                          <th>Action</th>
                        </tr>
                        @php $i=1; @endphp
                       @if(count($provider->sub_category)>0)
                         @foreach($provider->sub_category as $service)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$service->category->category_name}}</td>
                          <td>{{$service->sub_category_name}}</td>
                          <td>{{$service->pivot->resources}}</td>
                          <td><a href="{{route('delete_provider_cat',$service->pivot->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                        
                       
                       @endif
                        
                        
                      </table>
                      </div>
                      <div id="add_providing_services">
                        <h3>Add Your New Service</h3>
                        <form method="post" action="{{route('home')}}">
                          {{csrf_field()}}
                          <table class="table" style="width: 50%">
                            <tr>
                              <td><label >Select Category : </label>
                              <select class="form-control" name="category" id="category" onchange ="change_sub_cat()">
                                <option>--------</option>
                                 @foreach($categories as $category)
                                <option value="{{$category->id}}" id="{{$category->id}}" >{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </td>
                              
                            </tr>

                             <tr>
                              <td><label >Select Sub-Category : </label> 
                                <script> var sub=new Array();var sub_id=new Array(); </script>
                              <select class="form-control" name="sub_category" id="sub_category">
                                <option>--------</option>
                                @foreach($sub_categories as $sub_category)
                                 <script> sub['{{$sub_category->sub_category_name}}']={{$sub_category->category_id}};sub_id['{{$sub_category->sub_category_name}}']={{$sub_category->id}} </script>
                                @endforeach
                              
                              </select></td>
                              
                            </tr>

                             <tr>
                              <td><label >Your Resources : </label>
                              <input type="number" min="1" class="form-control" name="resource"></td>
                             
                            </tr>

                             <tr>
                              
                              <td><input class="btn btn-primary" type="submit" name="" value="Add"></td>
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
  </div>

    {{--Modal start--}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        
           <span><b>Category Name : </b></span><span id="category_name_show"></span>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Rank:</label>
            <input type="number" min="1" max="5" class="form-control" id="rank" name="rank" disabled="true">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Comment:</label>
            <textarea class="form-control" id="comment_text" name="comment" disabled="true"></textarea>
          </div>
         <form method="post" action="{{route('change_status')}}">
        {{csrf_field()}}
        <input type="hidden" name="id" id="booking_id">
        <div class="form-group">
            <label for="message-text" class="control-label">Change Status:</label>
            <select class="form-control" name="status">
              <option value="Panding">Panding</option>
              <option value="Accept">Accept</option>
              <option value="Complete">Complete</option>
              <option value="Reject">Reject</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <a  class="btn btn-default" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
 {{--Modal end--}}

  <script type="text/javascript">
    function change_sub_cat(){
      var id =document.getElementById('category').value;
      var sub_div =document.getElementById('sub_category');
      var data = '<select class="form-control" name="sub_category" id="sub_category">';
      for(var sub_name in sub){
        if(sub[sub_name] == id){
         data =data+'<option value="'+sub_id[sub_name]+'" >'+sub_name+'</option>';
      }
      }
      data =data+'</select>';
      sub_div.innerHTML=data;

    }

    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('todo') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('#category_name_show').text(recipient.category_name)
  modal.find('#rank').val(recipient.rank)
  modal.find('#comment_text').val(recipient.comment)
  modal.find('#booking_id').val(recipient.id)
})
  </script>
@endsection