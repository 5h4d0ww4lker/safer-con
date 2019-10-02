@extends('master')

@section('main_content')
@section('title', 'Orders')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage orders</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @permission('add_order')
                <a href="{{ route('orders.order.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                @endpermission
                <div class="btn-group pull-right">
                    <button type="button" class="tip btn btn-info btn-flat pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Reports <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ url('/orders/pdf') }}"><i class="icon fa fa-file"></i> PDF</a></li>
                        <li><a href="{{ url('/orders/excel') }}"><i class="icon fa fa-list"></i> Excel</a></li>
                    </ul>
                </div>


                <!-- Notification Box -->
            </div>
            <hr>
            <div class="col-md-12">
                @if (!empty(Session::get('message')))
                <div class="alert alert-success alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                </div>
                @elseif (!empty(Session::get('exception')))
                <div class="alert alert-error alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                </div>
                @endif
            </div>
            <!-- /.Notification Box -->
            <form action="{{ route('orders.order.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                    <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" name="start_date" type="text" id="datepicker3" />
                    <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" name="end_date" id="datepicker4" />
                        <!-- <input type="hidden" name="table" value="employees"> 
     <input type="hidden" name="request" value="people/employees">  -->
                        <button type="submit" class="btn btn-primary btn-filter"><i class="icon fa fa-filter"></i> Filter</button>
                </p>

            </form>
            <div class="table-responsive">

                <table id="example1" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Merchant</th>

                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Delivery Date with Status</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        use App\User;
                        use Carbon\Carbon;

                        $sl = 1 ?>
                        @foreach($orders as $order)
                        <?php $user = User::find($order->user_id);
                        $merchant = User::find($order->merchant_id);

                        $today = Carbon::now();
                        $date = Carbon::parse($order->delivery_date);
                        $diff = $date->diffInDays($today)
                        ?>
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{ $user->name }}&nbsp;{{ $user->father_name }}</td>
                            <td>{{ $merchant->name }}&nbsp;{{ $merchant->father_name }}</td>
                            <td>{{ optional($order->item)->name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{ ($order->price) *  ($order->quantity)}}</td>
                            <td>{{ $date}}
                                @if($order->status == 'Canceled' ||$order->status == 'Confirmed')

                                <span class="label label-success">Closed</span>
                                @endif
                                @if($today->gt($date)&& $order->status == 'Pending')

                                <span class="label label-danger">Delayed by {{$diff}} Days</span>
                                @endif
                                @if($date->gt($today)&& $order->status == 'Pending' && $diff < 2) <span class="label label-warning">In {{$diff}} Days</span>
                                    @endif

                                    @if($date->gt($today)&& $order->status == 'Pending' && $diff >= 2)
                                    <span class="label label-info">In {{$diff}} Days</span>
                                    @endif



                            </td>

                            <td>
                                @if($order->status == 'Pending')

                                <span class="label label-warning">Pending</span>
                                @endif
                                @if($order->status == 'Confirmed')

                                <span class="label label-success">Confirmed</span>
                                @endif
                                @if($order->status == 'Canceled')

                                <span class="label label-danger">Canceled</span>
                                @endif


                            </td>

                            <td>

                                <form method="POST" action="{!! route('orders.order.destroy', $order->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        @permission('show_order')
                                        <a href="{{ route('orders.order.show', $order->id ) }}" class="btn btn-info" title="Show Item">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('edit_order')
                                        <a href="{{ route('orders.order.edit', $order->id ) }}" class="btn btn-primary" title="Edit Order">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission

                                        @permission('delete_order')
                                        <button type="submit" class="btn btn-danger" title="Delete Order" onclick="return confirm(&quot;Click Ok to delete Order.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endpermission
                                    </div>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="box-footer">
                {!! $orders->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection