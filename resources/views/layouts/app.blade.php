<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <title>  @yield('title')</title>
        

    <!-- Styles -->
    <link href="{{asset('Asset/css/bootstrap.min.css')}}" rel="stylesheet"> 

    <link href="{{asset('Asset/css/style.css')}}" rel="stylesheet"> 
    <link href="{{asset('Asset/css/app.css')}}" rel="stylesheet"> 








    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
 <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</head>
<body>
 
     <!-- navigation bar -->
    <nav class="navbar custom-navber">
        <div class="container-fluid">
            <div class="navbar-header"> <a class="navbar-brand" href="{{url('/')}}">
               <img src="{{url('Asset/img/youcare.png')}}" style="width:80px;margin-top:-10px">
            </a> </div>
       

          <form class="navbar-form" role="search" style="height: 0px;text-align: center;">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
             <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (session('auth') === true)
                           <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ session('name') }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(session('Client') == true)
                                    <li><a href="{{url('customer/home')}}">Dashboard</a></li>
                                    @elseif(session('Service_provider') == true )
                                    <li><a href="{{url('service_provider/home')}}">Dashboard</a></li>
                                    @elseif(session('Admin') == true)
                                    <li><a href="{{url('admin/home')}}">Dashboard</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        
                        @else
                           <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Register <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('provider_register') }}">
                                            Service Provider Register
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer_register') }}">
                                            Customer Register
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Login <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('provider_login') }}">
                                            Service Provider
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('client_login') }}">
                                            Customer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin_login') }}">
                                            Admin
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                        @endif
                    </ul>
            
            
        </div>
    </nav>

    @yield('content')
    {{--footer--}}
      <div class="container-fluid" id="footer" style="background-color: #2BAF6C;color: #000000;margin-top: 15px;">
     <div class="row">
        <div class="col-md-12" style="background-color: black;color: white;text-align: center;padding: 10px;">All Rights Reserved @ hoom service</div>
         
     </div>
   </div>
  

    <!-- Scripts -->
    <script src="{{ asset('Asset/js/app.js') }}"></script>
 
    
   
</body>
</html>
