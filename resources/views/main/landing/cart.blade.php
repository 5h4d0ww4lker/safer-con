@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')

       <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>shopping cart</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="shopping-cart.html">Shopping cart</a></li>
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
                        @if($cart_items->count() > 0)
                            <h3 class="cart_single_title">Current Items on Cart</h3>
                            @endif
                            @if(Session::has('toasts'))
  @foreach(Session::get('toasts') as $toast)
    <div class="alert alert-{{ $toast['level'] }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

      {{ $toast['message'] }}
    </div>
  @endforeach
@endif
@if($cart_items->count() < 1)
                                <section class="emty_cart_area p_100" style="padding-left:10%">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Your Cart is Empty</h3>
                   
                </div>
            </div>
        </section>
                                @endif
                                @if($cart_items->count() > 0)
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align:center;"></th>
                                            <th scope="col" style="text-align:center;">Item</th>
                                            <th scope="col" style="text-align:center;">price</th>
                                            <th scope="col" style="text-align:center;">quantity</th>
                                            <th scope="col" style="text-align:center;">total</th>
                                            <th scope="col" style="text-align:center;"></th>
                                            <th scope="col" style="text-align:center;">added on</th>
                                            <th scope="col" style="text-align:center;">Remove</th>
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
                                        <td><p>{{$i++}}</p></td>
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
                                            <td><p><input id="price_{{$item->id}}" type="text" value="{{$item->item_price}}" disabled> ETB</p></td>
                                            <form    action="{{ route('submit_order') }}" method="post" id="order">
                                            {{ csrf_field() }}
                                            <td><input type="number" id="quantity_{{$item->id}}" min="1" name="quantities[]" onchange="myFunction_{{$item->id}}()" required></td>
                                            <td><input type="hidden" name="item_ids[]" value="{{$item->id}}" ></td>
                                            
                                            <td><p><input id="total_{{$item->id}}" type="text" value="{{$item->item_price}}" disabled>ETB</p></td>
                                            <td><p>{{$cart_item->created_at}}</p></td>
                                            <td scope="row">
                                           
                                
                                    
                                           <a href="{{ url('/remove_from_cart/'.$cart_item->id) }}" style="background-color:#d42421; color: #fff; border-radius:1px solid #d42421;"> <i class="icon-trash icons"></i></a>
                                      
                                        </td>
                                           <script type="text/javascript">
  function myFunction_{{$item->id}}() {

   var y = document.getElementById("price_{{$item->id}}").value;
    var z = document.getElementById("quantity_{{$item->id}}").value;;
    var x = y * z;
    document.getElementById("total_{{$item->id}}").value = x;


  }</script>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>

                            @endif





                        </div>
                        <div class="calculate_shoping_area">
                        @if($cart_items->count() > 0)
                        <button type="submit"  class="btn btn-primary checkout_btn">Submit Order</button>
                        @endif
                        </form>
                           
                          
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
        
        <!--================End Shopping Cart Area =================-->
        @endsection