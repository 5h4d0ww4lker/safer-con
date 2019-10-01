   <!--================Menu Area =================-->


   <header class="shop_header_area carousel_menu_area">
       <div class="carousel_top_header row m0">
           <div class="container">
               <div class="carousel_top_h_inner">
                   <div class="float-md-left">
                       <div class="top_header_left">
                           <div class="selector">

                               <div id="google_translate_element"></div>
                           </div>


                       </div>
                   </div>

                   <div class="float-md-right">
                       <div class="top_header_middle">
                           <a href="#"><i class="fa fa-phone"></i> Call Us: <span>+251973836611</span></a>
                           <a href="#"><i class="fa fa-envelope"></i> Email: <span>support@arganon.com</span></a>
                           <a href="{{ url('/login') }}"><i class="fa fa-user"></i> Merchant Login</span></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="carousel_menu_inner">
           <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                   <a class="navbar-brand" href="{{ url('/') }}"><img src="/public/main/img/index2.png" alt=""></a>
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>

                   </button>

                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav mr-auto">
                           @if($active == 'home')
                           <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                           @else
                           <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                           @endif
                           @if($active == 'products')
                           <li class="nav-item active"><a class="nav-link" href="{{ url('/products') }}">Products</a></li>
                           @else
                           <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Products</a></li>
                           @endif
                           @if($active == 'orders')
                           <li class="nav-item active"><a class="nav-link" href="{{ url('/my_orders') }}">My Orders</a></li>
                           @else
                           <li class="nav-item"><a class="nav-link" href="{{ url('/my_orders') }}">My Orders</a></li>
                           @endif

                           @if($active == 'orders_history')
                           <li class="nav-item active"><a class="nav-link" href="{{ url('/order_history') }}">History</a></li>
                           @else
                           <li class="nav-item"><a class="nav-link" href="{{ url('/order_history') }}">History</a></li>
                           @endif
                           @if($active == 'contact')
                           <li class="nav-item active"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                           @else
                           <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                           @endif





                       </ul>
                       <ul class="navbar-nav justify-content-end">
                           @if($active == 'search')
                           <li class="search_icon"><a href="{{ url('/search_item') }}" style="color:red;"><i class="icon-magnifier icons"></i></a></li>

                           @else
                           <li class="search_icon"><a href="{{ url('/search_item') }}"><i class="icon-magnifier icons"></i></a></li>

                           @endif


                           @if(empty(auth()->user()->name))
                           <li class="user_icon"><a href="{{ url('/account') }}"><i class="icon-user icons"></i></a></li>
                           @endif
                           @if(!empty(auth()->user()->name))
                           <?php
                            $count = \App\Models\ShoppingCart::where('user_id', auth()->user()->id)->where('status', 'On Cart')->count();

                            ?>
                           @if($active == 'cart')
                           <li><a href="{{ url('/cart') }}" style="color:red;"><i class="icon-handbag  "></i> {{$count}}</a></li>
                           @else
                           <li><a href="{{ url('/cart') }}"><i class="icon-handbag  "></i> {{$count}}</a></li>
                           @endif
                           @endif


                           @if(!empty(auth()->user()->name))
                           <?php
                            $count2 = \App\Models\Wishlist::where('user_id', auth()->user()->id)->count();

                            ?>
                           @if($active == 'wishlist')
                           <li class="user_icon"><a href="{{ url('/my_wishlists') }}" style="color:red;"><i class="fa fa-heart"></i>{{$count2}}</a></li>
                           @else
                           <li class="user_icon"><a href="{{ url('/my_wishlists') }}"><i class="fa fa-heart"></i>{{$count2}}</a></li>
                           @endif

                           @endif


                           @if(!empty(auth()->user()->name))
                           <?php
                            $count3 = \App\Models\Notification::where('notify_to', auth()->user()->id)->where('status', 'Pending')->count();

                            ?>
                           @if($active == 'notification')
                           <li><a href="{{ url('/my_notifications') }}" style="color:red;"><i class="fa fa-envelope"></i>{{$count3}}</a></li>
                           @else
                           <li><a href="{{ url('/my_notifications') }}"><i class="fa fa-envelope"></i>{{$count3}}</a></li>
                           @endif

                           @endif

                           @if(!empty(auth()->user()->name))
                           @if($active == 'profile')
                           <li class="user_icon"><a href="{{ url('/profile') }}" style="color:red;"><i class="icon-user icons"></i></a></li>
                           @else
                           <li class="user_icon"><a href="{{ url('/profile') }}"><i class="icon-user icons"></i></a></li>

                           @endif

                           @endif
                       </ul>
                   </div>
               </nav>
           </div>
       </div>
   </header>
   <!--================End Menu Area =================-->