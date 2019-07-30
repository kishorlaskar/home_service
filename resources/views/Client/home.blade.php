@extends('layouts.app')

@section('content')

<div class="container-fluid">
   <div class="row">
       <div class="col-md-3" >
   @include('layouts.client_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Client DashBoard</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Giving Service List</h3>
                      <table class="table">
                        <tr>
                          <th>SL</th>
                          <th>Provider</th>
                          <th>Booking Time</th>
                          <th>Sub-Category</th>
                          <th>Status</th>
                          <th>CheckOut</th>
                          <th>More</th>
                        </tr>
                        @php $i=1; @endphp
                        @if(count($bookings)>0)
                          @foreach($bookings as $booking)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$booking->service_provider->name}}</td>
                            <td>{{$booking->booking_date_time}}</td>
                            <td>{{$booking->sub_category->sub_category_name}}</td>
                            <td>{!!$booking->status!!}</td>
                            <td><a href="{{route('customer/checkout')}}">checkout</a></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-todo='{"id":"{{$booking->id}}","category_name":"{{$booking->sub_category->category->category_name}}","rank":"{{$booking->rank}}","comment":"{{$booking->comment}}"}'>More</button></td>
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
  {{--Modal start--}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form>
        {{csrf_field()}}
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="booking_id">
           <span><b>Category Name : </b></span><span id="category_name_show"></span>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Rank:</label>
            <input type="number" min="1" max="5" class="form-control" id="rank" name="rank">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Comment:</label>
            <textarea class="form-control" id="comment_text" name="comment"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
 {{--Modal end--}}

<script type="text/javascript">
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