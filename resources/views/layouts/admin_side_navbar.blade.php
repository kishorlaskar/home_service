<div class="list-group">
    <style type="text/css">
        a{
            text-align: left !important;
        }
        .left{
            padding-left:35px;
        }
    </style>
    <a class="list-group-item"><img  src="{{url('Asset/img/user_logo.png')}}" style="height: 50px;width: 50px;border-radius: 50%;margin-left: 45%;"></a>
  <a class=" btn list-group-item" href="{{'home'}}">Dashboard</a>
  <a class=" btn list-group-item" href="{{'service_provider_list'}}">Service Provider List</a>
  <a class=" btn list-group-item" href="{{'client_list'}}">Client List</a>
  <button type="button" class="list-group-item" id="category" onclick="expend(this.id)">Category <span class="caret" style="float: right"></span> </button>
     <div hidden="true" id="category1" style=""> 
          <a class="list-group-item left" href="{{'main_category'}}">Main Category</a>
          <a class="list-group-item left" href="{{'sub_category'}}">Sub Category</a>
    </div>                         
</div>

 <script> 
function expend(id){
    $("#"+id+"1").animate({
      height: 'toggle'
    });
}

</script> 