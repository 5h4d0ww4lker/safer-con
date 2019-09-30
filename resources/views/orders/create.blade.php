@extends('master')

@section('main_content')
@section('title', 'Orders')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Items        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Orders</a></li>
            <li class="active">Add order</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add order</h3>

            <form method="POST" action="{{ route('orders.order.store') }}" accept-charset="UTF-8" id="create_order_form" name="create_order_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('orders.form', [
                                        'order' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

            </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

@endsection


