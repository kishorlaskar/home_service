<div class="list-group">
    <style type="text/css">
        a{
            text-align: left !important;
        }
        .left{
            padding-left:35px;
        }
    </style>
    @php $s='Asset/img/user_logo.png';@endphp
    <a class="list-group-item"><img  src="{{url('storage/app/public/provider_image/'.session('id').'.jpg')}}" alt="Image not found" onerror="this.onerror=null;this.src='{{url($s)}}';"  style="height: 50px;width: 50px;border-radius: 50%;margin-left: 45%;"></a>
  <a class=" btn list-group-item" href="{{'home'}}">Dashboard</a>
  <a class=" btn list-group-item" href="{{'account_info'}}">Account Info</a>                        
</div>
