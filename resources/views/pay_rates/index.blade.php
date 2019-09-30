@extends('master')

@section('main_content')
@section('title', 'Pay Rates')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pay Rates
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Pay Rates</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage pay rates</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('pay_rates.pay_rate.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                <div class="btn-group pull-right">
                    <button type="button" class="tip btn btn-info btn-flat pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Reports <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      
                        <li><a href="{{ url('/payRates/pdf') }}"><i class="icon fa fa-file"></i> PDF</a></li>
                        <li><a href="{{ url('/payRates/excel') }}"><i class="icon fa fa-list"></i> Excel</a></li>
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
            <form action="{{ route('pay_rates.pay_rate.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
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
                            <th>Name</th>
                            <th>Percentage From Merchant</th>
                            <th>Percentage From Customer</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                           

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sl = 1 ?>
                    @foreach($payRates as $payRate)
                        <tr>
                        <td>{{$sl++}}</td>
                            <td>{{ $payRate->name }}</td>
                            <td>{{ $payRate->percentage_from_merchant }}%</td>
                            <td>{{ $payRate->percentage_from_customer }}%</td>
                            <td>{{ optional($payRate->creator)->name }}</td>
                            <td>{{ optional($payRate->updater)->name }}</td>
                            

                            <td>

                                <form method="POST" action="{!! route('pay_rates.pay_rate.destroy', $payRate->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                      
                                        <a href="{{ route('pay_rates.pay_rate.edit', $payRate->id ) }}" class="btn btn-primary" title="Edit Pay Rate">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Pay Rate" onclick="return confirm(&quot;Click Ok to delete Pay Rate.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                </div>


<div class="box-footer">
    {!! $payRates->render() !!}
</div>



</div>
</section>
</div>
@endsection