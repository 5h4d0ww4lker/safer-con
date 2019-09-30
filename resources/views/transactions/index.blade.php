@extends('master')

@section('main_content')
@section('title', 'Transactions')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transactions
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Transactions</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-btransaction">
                <h3 class="box-title">Manage transactions</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                   <div class="btn-group pull-right">
                    <button type="button" class="tip btn btn-info btn-flat pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Reports <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                       
                        <li><a href="{{ url('/transactions/pdf') }}"><i class="icon fa fa-file"></i> PDF</a></li>
                        <li><a href="{{ url('/transactions/excel') }}"><i class="icon fa fa-list"></i> Excel</a></li>
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
            <form action="{{ route('transactions.transaction.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
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
                            <th>From</th>
                            <th>To</th>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Status</th>
                            
                           

                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                    @foreach($transactions as $transaction)
                    <?php
                                    $from = \App\User::find($transaction->from);
                                    $to = \App\User::find($transaction->to);
                                    $order = \App\Order::find($transaction->order_id);
                                    $item = \App\Item::find($order->item_id);
                                  
                                    ?>
                        <tr>
                        <td>{{$i++ }}</td>
                       
                            <td>{{$from->name }}&nbsp; {{$from->father_name }}</td>
                            <td>{{$to->name }}&nbsp; {{$to->father_name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>
                                @if($transaction->status == 'Pending')
                                
                           <span class="label label-warning">Pending</span>
                           @endif
                           @if($transaction->status == 'Completed')
                                
                                <span class="label label-success">Completed</span>
                                @endif
                                @if($transaction->status == 'Cancelled')
                                
                                <span class="label label-danger">Cancelled</span>
                                @endif
                        
                        
                        </td>
                           

                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                </div>


<div class="box-footer">
    {!! $transactions->render() !!}
</div>



</div>
</section>
</div>
@endsection