        <!--================Categories Banner Area =================-->
        @extends('landing_master')

        @section('main_content')
        @section('title', 'Welcome - Arganon')


        <!--================End Categories Banner Area =================-->

        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">

                            <div class="categories_product_area">
                                <div class="row">
                                @if(Session::has('toasts'))
                                     @foreach(Session::get('toasts') as $toast)
    <div class="alert alert-{{ $toast['level'] }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

      {{ $toast['message'] }}
    </div>
  @endforeach
@endif
                                    <div class="col-lg-12">
                                        <div class="billing_details">
                                            <h2 class="reg_title">Personal Information</h2>
                                            <form class="billing_inner row" action="{{ route('update_profile') }}" method="post">
                                                <div class="col-lg-6">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="name">First Name <span>*</span></label>
                                                            <input type="text" class="form-control" value="{{$user_info->name}} {{$user_info->father_name}}" id="name" aria-describedby="name" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="email">Email <span>*</span></label>
                                                            <input type="email" name="email" value="{{$user_info->email}}" class="form-control" id="email" aria-describedby="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="phone">Phone <span>*</span></label>
                                                            <input type="text" name="phone_number_1" value="{{$user_info->phone_no}}" class="form-control" id="phone" aria-describedby="phone" required>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="cname">Gender<span>*</span></label>
                                                            <select class="selectpicker" id="cname" name="gender" required>
                                                                <option selected value="{{$user_info->gender}}">{{$user_info->gender}}</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="phone">Birthdate <span>*</span></label>
                                                            <input type="date" name="date_of_birth" value="{{$user_info->date_of_birth}}" class="form-control" id="phone" aria-describedby="phone" required>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-lg-6">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="ctown">Region <span>*</span></label>
                                                            <select class="selectpicker" id="ctown" name="region" required>
                                                                <option value="{{$address_info->region}}" selected>{{$user_info->region}}
                                                                <option>
                                                                <option value="Addis Ababa">Addis Ababa</option>
                                                                <option value="Afar">Afar</option>
                                                                <option value="Amhara">Amhara</option>
                                                                <option value="Benishangul Gumz">Benishangul Gumz</option>
                                                                <option value="Diredawa">Diredawa</option>
                                                                <option value="Gambela">Gambela</option>
                                                                <option value="Harari">Harari</option>
                                                                <option value="Oromia">Oromia</option>
                                                                <option value="Somali">Somali</option>
                                                                <option value="SNNP">SNNP</option>
                                                                <option value="Tigray">Tigray</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">City <span>*</span></label>
                                                            <input type="text" name="city" value="{{$address_info->city}}" class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Sub City <span>*</span></label>
                                                            <input type="text" name="sub_city" value="{{$address_info->sub_city}}" class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Location<span>*</span></label>
                                                            <input type="text" name="location" value="{{$address_info->location}}" class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Building (Nearby building form your residence.) <span>*</span></label>
                                                            <input type="text" name="building" value="{{$address_info->building}}" class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                                                    <button type="submit" value="submit" class="btn subs_btn form-control">Update Profile</button>
                                                    <br><br>
                                                </div>

                                            </form>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 float-md-right">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>{{$user_info->name}}&nbsp;{{$user_info->father_name}}</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/profile') }}" style="color:#d91522; font-weight:501">Update Personal Information
                                                <i class="icon-user" aria-hidden="true" style="color:#d91522;"></i>

                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/my_transactions') }}">View Transactions
                                                <i class="icon_table" aria-hidden="true"></i>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/credit_info') }}">View Credit Information
                                                <i class="icon_currency" aria-hidden="true"></i>

                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/my_credit_requests') }}">My Credit Requests
                                                <i class="fa fa-question" aria-hidden="true"></i>

                                            </a>
                                        </li>

                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/request_credit') }}">Request New Credit
                                                <i class="fa fa-question" aria-hidden="true"></i>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/change_password') }}">Change Password
                                                <i class="fa fa-key" aria-hidden="true"></i>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="{{ url('/log_out') }}">Logout
                                                <i class="fa fa-power-off" aria-hidden="true"></i>

                                            </a>
                                        </li>


                                    </ul>
                                </aside>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        @endsection