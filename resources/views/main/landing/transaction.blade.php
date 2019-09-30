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
                    <div class="row">
                    @if(Session::has('toasts'))
                    @foreach(Session::get('toasts') as $toast)
    <div class="alert alert-{{ $toast['level'] }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

      {{ $toast['message'] }}
    </div>
  @endforeach
@endif
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
                                            <a class="nav-link" href="{{ url('/my_transactions') }}" style="color:#d91522; font-weight:501">View Transactions
                                                <i class="icon_table" aria-hidden="true" style="color:#d91522;"></i>

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
                        <div class="col-lg-9">
                            <div class="cart_product_list">
                                <h3 class="cart_single_title">Transactions</h3>
                                <div class="table-responsive-md">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" style="text-align:center;">To</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            ?>
                                            @foreach($transactions as $transaction)
                                            <?php
                                            $merchant = \App\User::find($transaction->to);
                                            ?>
                                            <tr>
                                                <td>{{$i++}} </td>
                                                <td> <p>{{$merchant->name}} &nbsp; {{$merchant->father_name}}</p> </td>
                                                <td>{{$transaction->amount}}</td>
                                                <td> {{$transaction->created_at}} </td>
                                                <td> {{$transaction->status}} </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                       
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        @endsection