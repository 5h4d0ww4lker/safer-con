@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')

<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
    <div class="container">
        <div class="solid_banner_inner">
            <h3>My Notifications</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Notifications</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================Shopping Cart Area =================-->
<section class="shopping_cart_area p_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_product_list">
                @if($notifications->count() > 0)
                    <h3 class="cart_single_title">New Notifications</h3>
                    @endif
                    @if(Session::has('toasts'))
                    @foreach(Session::get('toasts') as $toast)
                    <div class="alert alert-{{ $toast['level'] }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {{ $toast['message'] }}
                    </div>
                    @endforeach
                    @endif

                    @if($notifications->count() < 1) <section class="emty_cart_area p_100" style="padding-left:10%">
                        <div class="container">
                            <div class="emty_cart_inner">
                                <i class="fa fa-envelope"></i>
                                <h3>No new notifications</h3>

                            </div>
                        </div>
</section>
@else

<div class="table-responsive-md">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                <th scope="col" style="text-align:center;">Message</th>
                <th scope="col" style="text-align:center;">Created At</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            @foreach($notifications as $notification)


            <tr>
                <td>
                    <p>{{$i++}}</p>
                </td>

                <td>
                    <p>{{$notification->content}}</p>
                </td>
                <td>
                    <p>{{$notification->created_at}}</p>
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
        {{ $notifications->links() }}
    </nav>
</div>

@endif


</div>

</div>
</div>
</section>

<!--================End Shopping Cart Area =================-->
@endsection