    <!-- Preloader -->
    <style>
        .active {
            color: #f6b60b;
        }
    </style>
    <div class="preloader"></div>

    <!-- Top Header_Area -->
    <section class="top_header_area">
        <div class="container">
            <?php

            use App\Models\Contact;

            $contacts = Contact::first()->paginate(1000);
            ?>
            @foreach($contacts as $contact)
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fa fa-phone"></i>{{$contact->phone}}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>{{$contact->email}}</a></li>

            </ul>
            @endforeach

            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- End Top Header_Area -->

    <!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('/public/main/images/logo.png')}}" alt=""></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            @if($active == 'home')
                            <a style="color:#f6b60b" href="{{url('/')}}">Home</a>
                            @else
                            <a href="{{url('/')}}">Home</a>
                            @endif
                        </li>
                        <li>
                            @if($active == 'about')
                            <a style="color:#f6b60b" href="{{url('/about')}}">About Us</a>
                            @else
                            <a href="{{url('/about')}}">About Us</a>
                            @endif

                        </li>
                        <li>
                            @if($active == 'service')
                            <a style="color:#f6b60b" href="{{url('/service')}}">Services</a>
                            @else
                            <a href="{{url('/service')}}">Services</a>
                            @endif


                        </li>
                        <li> @if($active == 'gallery')

                            <a style="color:#f6b60b" href="{{url('/gallery')}}">Gallery</a>
                            @else
                            <a href="{{url('/gallery')}}">Gallery</a>
                            @endif
                        </li>

                        <li>
                            @if($active == 'contact')

                            <a style="color:#f6b60b" href="{{url('/contact')}}">Contact</a>

                            @else
                            <a href="{{url('/contact')}}">Contact</a>
                            @endif


                        </li>
                        <li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
    <!-- End Header_Area -->