@extends('master')

@section('main_content')
@section('title', 'Orders')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Orders</a></li>
            <li class="active">Edit Order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6" >
            <div class="box-header with-border">
                <h3 class="box-title">Edit Order</h3>

               
            </div>
            <!-- /.box-header -->

            <form method="POST" action="{{ route('orders.order.update', $order->id) }}" id="edit_order_form" name="edit_order_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('orders.form', [
                                        'order' => $order,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>
            </div>
    </section>
    </div>

@endsection