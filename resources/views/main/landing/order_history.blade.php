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
                <li><a href="#">Orders History</a></li>
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
                    <h3 class="cart_single_title">Previously Ordered Items</h3>
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
                                    <th scope="col" style="text-align:center;">Item</th>
                                    <th scope="col" style="text-align:center;">price</th>
                                    <th scope="col" style="text-align:center;">qunatity</th>
                                    <th scope="col" style="text-align:center;"></th>
                                    <th scope="col" style="text-align:center;">total</th>
                                    <th scope="col" style="text-align:center;">ordered on</th>
                                    <th scope="col" style="text-align:center;">Status</th>
                                  
                                    <th scope="col">Info</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($cart_items as $cart_item)

                                <?php
                                $item = \App\Models\Item::find($cart_item->item_id);

                                ?>
                                <tr>
                                    <td>
                                        <p>{{$i++}}</p>
                                    </td>
                                    <td>

                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{$item->file_1}}" width="100" alt="">
                                            </div>
                                            <div class="media-body">
                                                <h4>{{$item->name}}</h4>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <p><input id="price_{{$item->id}}" type="text" value="{{$item->item_price}}" disabled> ETB</p>
                                    </td>
                                    <form action="{{ route('submit_order') }}" method="post" id="order">
                                        {{ csrf_field() }}
                                        <td><input type="number" id="quantity_{{$item->id}}" name="quantities[]" value="{{$cart_item->quantity}}" onchange="myFunction_{{$item->id}}()" disabled></td>
                                        <td><input type="hidden" name="item_ids[]" value="{{$item->id}}"></td>

                                        <td>
                                            <p><input id="total_{{$item->id}}" type="text" value="{{$cart_item->toatl_amount}}" disabled>ETB</p>
                                        </td>
                                        <td>
                                            <p>{{$cart_item->created_at}}</p>
                                        </td>
                                        <td>
                                            @if($cart_item->status == 'Pending')

                                            <p> <span class="label label-warning" style="color:white; background-color:orangered">Pending</span></p>
                                            @endif
                                            @if($cart_item->status == 'Confirmed')

                                            <p> <span class="label label-success" style="color:white; background-color:green">Confirmed</span></p>
                                            @endif
                                            @if($cart_item->status == 'Canceled')

                                            <p> <span class="label label-danger" style="color:white; background-color:#d42421">Canceled</span></p>
                                            @endif

                                        </td>
                                        
                                        <th scope="row">
                                            <a href="{{ url('/order_details/'.$cart_item->id) }}" style="background-color:lightseagreen; color: #fff; border-radius:4px solid #d42421;"> &nbsp;&nbsp;<i class="fa fa-info"></i>&nbsp;&nbsp;</a>

                                        </th>
                                        <script type="text/javascript">
                                            function myFunction_ {
                                                {
                                                    $item - > id
                                                }
                                            }() {

                                                var y = document.getElementById("price_{{$item->id}}").value;
                                                var z = document.getElementById("quantity_{{$item->id}}").value;;
                                                var x = y * z;
                                                document.getElementById("total_{{$item->id}}").value = x;


                                            }
                                        </script>
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
                        {{ $cart_items->links() }}
                    </nav>
                </div>
            </div>

        </div>
    </div>
</section>

<!--================End Shopping Cart Area =================-->
@endsection