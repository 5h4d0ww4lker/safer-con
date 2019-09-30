@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')

<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
    <div class="container">
        <div class="solid_banner_inner">
            <h3>My Orders</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Credit Requests</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Shopping Cart Area =================-->
<section class="shopping_cart_area p_100">
    <div class="container">
        <div class="row">
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
                                <a class="nav-link" href="{{ url('/credit_info') }}" >View Credit Information
                                    <i class="icon_currency" aria-hidden="true" ></i>

                                </a>
                            </li>
                            <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/my_credit_requests') }}"  style="color:#d91522; font-weight:501">My Credit Requests
                                                <i class="fa fa-question" aria-hidden="true"  style="color:#d91522;"></i>

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
            <div class="col-lg-8 offset-1">
                <div class="cart_product_list">
                    <h3 class="cart_single_title" style="text-align:center;">Credit Requests</h3>
                    @if(Session::has('toasts'))
                    @foreach(Session::get('toasts') as $toast)
                    <div class="alert alert-{{ $toast['level'] }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {{ $toast['message'] }}
                    </div>
                    @endforeach
                    @endif
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">#</th>
                                    <th scope="col" style="text-align:center;">Bank</th>
                                    <th scope="col" style="text-align:center;">Transaction ID</th>
                                    <th scope="col" style="text-align:center;">Amount</th>
                                    <th scope="col" style="text-align:center;">Status</th>
                                    <th scope="col" style="text-align:center;">Requested On</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($credit_requests as $credit_request)

                                <?php
                                $bank = \App\Models\Bank::find($credit_request->bank_id);

                                ?>
                                <tr>

                                    <td>
                                        <p>{{$i++}}</p>
                                    </td>
                                    <td>
                                        <p>{{$bank->name}}</p>
                                    </td>

                                    <td>
                                        <p>{{$credit_request->transaction_id}}</p>
                                    </td>


                                    <td>
                                        <p>{{$credit_request->amount}}</p>
                                        </p>
                                    </td>
                                    <td>
                                        <p>{{$credit_request->status}}</p>
                                        </p>
                                    </td>
                                    <td>
                                        <p>{{$credit_request->created_at}}</p>
                                    </td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="calculate_shoping_area">

                    <!-- <button type="submit"  class="btn btn-primary checkout_btn">Submit Order</button> -->
                    </form>

                    <nav aria-label="Page navigation example" class="pagination_area">
                        {{ $credit_requests->links() }}
                    </nav>
                </div>
            </div>
            

        </div>
    </div>
</section>

<!--================End Shopping Cart Area =================-->
@endsection