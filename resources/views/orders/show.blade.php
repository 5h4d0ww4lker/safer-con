@extends('master')

@section('main_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Orders</a></li>
            <li class="active">Order Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-heading clearfix">

                <span class="pull-left">
                    <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Order' }}</h4>
                </span>



            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <dl class="dl-horizontal">
                            <h5>Ordered By</h5>
                            <dt>User</dt>
                            <dd>{{ optional($order->user)->name }}&nbsp;{{ optional($order->user)->father_name }}</dd>
                            <dt>Item</dt>
                            <dd>{{ optional($order->item)->name }}</dd>
                            <dt>Quantity</dt>
                            <dd>{{$order->quantity }}</dd>
                            <dt>Price</dt>
                            <dd>{{ $order->price }}</dd>
                            <dt>Toatl Amount</dt>
                            <dd>{{ $order->toatl_amount }}</dd>
                            <dt>Status</dt>
                            <dd> @if($order->status == 'Pending')

                                <span class="label label-warning">Pending</span>
                                @endif
                                @if($order->status == 'Confirmed')

                                <span class="label label-success">Confirmed</span>
                                @endif
                                @if($order->status == 'Canceled')

                                <span class="label label-danger">Canceled</span>
                                @endif</dd>

                            <dt>Ordered At</dt>
                            <dd>{{ $order->created_at }}</dd>

                        </dl>
                    </div>
                    <div class="col-md-4">
                        <dl class="dl-horizontal">
                            <h5>Ship to</h5>
                            <?php
                            $address =   \App\Address::find($order->ship_to);
                            ?>
                            <dt>Region</dt>
                            <dd>{{@$address->region }}</dd>
                            <dt>City</dt>
                            <dd>{{@$address->city }}</dd>
                            <dt>Sub City</dt>
                            <dd>{{@$address->sub_city }}</dd>
                            <dt>Location</dt>
                            <dd>{{@$address->location }}</dd>
                            <dt>Building</dt>
                            <dd>{{ @$address->building }}</dd>

                            <dt>Contact Phone</dt>
                            <dd>{{ @$address->phone_number_1	 }}</dd>
                    </div>

                    <div class="col-md-4">
                        <dl class="dl-horizontal">
                            <h5>Image</h5>


                            <img src="{{ url('/' . $order->item->file_1) }}" class="img-responsive img-thumbnail" width="200px" height="200px">

                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
@endsection