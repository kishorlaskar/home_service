<div class="list-group">
    <style type="text/css">
        a{
            text-align: left !important;
        }
        .left{
            padding-left:35px;
        }
    </style>
    <a class="list-group-item">@php $s='Asset/img/user_logo.png'; @endphp
        <img  src="{{url('storage/app/public/client_image/'.session('id').'.jpg')}}" alt="Image not found" onerror="this.onerror=null;this.src='{{url($s)}}';" style="height: 50px;width: 50px;border-radius: 50%;margin-left: 45%;"></a>
  <a class=" btn list-group-item" href="{{url('customer/home')}}">Dashboard</a>
  <a class=" btn list-group-item" href="{{url('customer/account_info')}}">Account Info</a>                        
</div>
