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
                                @if(Session::has('toasts'))
                                @foreach(Session::get('toasts') as $toast)
                                <div class="alert alert-{{ $toast['level'] }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                    {{ $toast['message'] }}
                                </div>
                                @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-5 offset-2">

                                        <div class="order_box_price">
                                            <h2 class="reg_title">Credit Info</h2>
                                            <div class="payment_list">
                                                <div class="price_single_cost">
                                                    <h5>Available Credit <span>{{$credit_info->amount}} &nbsp;ETB</span></h5>
                                                    <h5>Credit On Hold <span>{{$credit_info->on_hold}} &nbsp;ETB</span></h5>

                                                    <h3><span class="normal_text">Total Credit</span> <span>{{($credit_info->amount) + ($credit_info->on_hold)}} &nbsp;ETB</span></h3>
                                                </div>

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
                                            <a class="nav-link" href="{{ url('/credit_info') }}" style="color:#d91522; font-weight:501">View Credit Information
                                                <i class="icon_currency" aria-hidden="true" style="color:#d91522;"></i>

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
                                            <a class="nav-link" href="{{ url('/my_credit_transfers') }}">My Credit Transfers
                                                <i class="fa fa-bar-chart" aria-hidden="true"></i>

                                            </a>
                                        </li>

                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/transfer_credit') }}">Transfer Credit
                                                <i class="fa fa-cc-amex" aria-hidden="true"></i>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/change_password') }}">Change Password
                                                <i class="fa fa-key" aria-hidden="true" ></i>

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