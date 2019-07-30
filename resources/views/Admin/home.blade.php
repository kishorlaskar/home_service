@extends('layouts.app')

@section('content')

<div class="container-fluid">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

   <div class="row">
       <div class="col-md-3" >
   @include('layouts.admin_side_navbar')
       </div>
       <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Admin</div>
                <div class="panel-body">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <canvas id="1" class="graph""></canvas>
                    <canvas id="2" class="graph"></canvas>
                    <canvas id="3" class="graph"></canvas>
                  </div>
                </div>
            </div>

          </div>
    </div>
  </div>
  <script type="text/javascript">
      var datetime=new Array,booking =new Array(),provider =new Array(),client =new Array();
  </script>
  @for($i=0;$i<=10;$i++)
    <script type="text/javascript">
      datetime.push("{{$datetime[$i]}}");
      booking.push("{{$bookings[$i]}}");
      provider.push("{{$service_providers[$i]}}");
      client.push("{{$clients[$i]}}");
    </script>
  @endfor
   <script type="text/javascript">
  var label=['Booking Dataset','Service Provider Dataset','Client Dataset']
  var data=[booking,provider,client]
    for(var i=1;i<4;i++){
         var ctx = document.getElementById(i).getContext('2d');
              var chart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: datetime,
                  datasets: [{
                      label: label[i-1],
                      backgroundColor: 'rgb(255, 99, 132)',
                      borderColor: 'rgb(255, 99, 132)',
                      data: data[i-1],
                  }]
              },
              options: {}
          });
   }
 </script>
@endsection