        <!--================Categories Banner Area =================-->
        @extends('landing_master')

        @section('main_content')
        @section('title', 'Welcome - Arganon')


        <style>
            #sel {
                height: 50px;

                border: 1px solid #cccccc;

                border-radius: 0px;

                -webkit-box-shadow: none;

                box-shadow: none;

                outline: none;

                padding: 0px 22px;

                box-shadow: none;

                line-height: 50px;
                display: block;

                width: 100%;

                padding: .375rem .75rem;

                font-size: 1rem;

                line-height: 1.5;

                color:
                    #495057;

                background-color:
                    #fff;

                background-image: none;

                background-clip: padding-box;

                border: 1px solid #ced4da;

                border-radius: .25rem;

                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            }
        </style>
        <!--================End Categories Banner Area =================-->

        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">


                            <div class="categories_product_area">
                              
                                <div class="row">
                                    <div class="col-lg-7 offset-2">
                                    @if(Session::has('toasts'))
                                @foreach(Session::get('toasts') as $toast)
                                <div class="alert alert-{{ $toast['level'] }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                    {{ $toast['message'] }}
                                </div>
                                @endforeach
                                @endif
                                        <div class="order_box_price">
                                            <h2 class="reg_title">Change Password</h2>
                                            <div class="payment_list">

                                                <form action="{{ url('update_password') }}" method="post" id="order">
                                                    {{ csrf_field() }}
                                                   
                                                    <div class="col-lg-12 form-group">
                                                        <label for="text">Current Password</label>
                                                        <input class="form-control" type="password" name="current_password" required>
                                                    </div>

                                                    <div class="col-lg-12 form-group">
                                                        <label for="text">New Password</label>
                                                        <input class="form-control" type="password" name="new_password" required>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label for="text">Confirm New Password</label>
                                                        <input class="form-control" type="password" name="confirmation_password" required>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <button type="submit" class="btn btn-primary checkout_btn">Change</button>
                                                    </div>
                                                </form>
                                                <p>Note: If you forgot your current password you can <a href="{{ url('/reset_password') }}" style="color:#d91522; font-weight:501">Reset
                                              

                                            </a> it here.</p>

                                            </div>

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
                                            <a class="nav-link" href="{{ url('/profile') }}">Update Personal Information
                                                <i class="icon-user" aria-hidden="true"></i>

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
                                            <a class="nav-link" href="{{ url('/request_credit') }}" >Request New Credit
                                                <i class="fa fa-question" aria-hidden="true" style="color:#d91522;"></i>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/change_password') }}" style="color:#d91522; font-weight:501">Change Password
                                                <i class="fa fa-key" aria-hidden="true" style="color:#d91522;"></i>

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