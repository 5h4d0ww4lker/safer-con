@extends('master')

@section('main_content')
@section('title', 'Credit Requests')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Credit Requests
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>People</a></li>
            <li class="active">Credit Requests</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Credit Requests</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('credit_requests.credit_request.request_credit') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                <div class="btn-group pull-right">
                    <button type="button" class="tip btn btn-info btn-flat pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Reports <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('#') }}"><i class="icon fa fa-print"></i> Print</a></li>
                        <li><a href="{{ url('#') }}"><i class="icon fa fa-file"></i> PDF</a></li>
                        <li><a href="{{ url('#') }}"><i class="icon fa fa-list"></i> Excel</a></li>
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
                <div class="alert alert-warning alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                </div>
                @endif
            </div>
            <!-- /.Notification Box -->
            <form action="{{ url('people/employees') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
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
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th> #</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Bank</th>
                            <th>Transaction ID</th>


                            <th>Updated By</th>
                            <th>Status</th>


                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1 ?>
                        @foreach($creditRequests as $creditRequest)

                        <tr>
                            <td>{{$sl++}}
                            </td>
                            <td>{{ optional($creditRequest->user)->name }}&nbsp;{{ optional($creditRequest->user)->father_name }}</td>
                            <td>{{ $creditRequest->amount }}</td>
                            <td>{{ optional($creditRequest->bank)->name }}</td>
                            <td>{{ $creditRequest->transaction_id }}</td>


                            <td>{{ optional($creditRequest->updater)->name }}</td>
                            <td>
                                @if($creditRequest->status == 'Pending')
                                
                           <span class="label label-warning">Pending</span>
                           @endif
                           @if($creditRequest->status == 'Confirmed')
                                
                                <span class="label label-success">Confirmed</span>
                                @endif
                                @if($creditRequest->status == 'Declined')
                                
                                <span class="label label-danger">Declined</span>
                                @endif
                        
                        
                        </td>



                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="box-footer">
                {!! $creditRequests->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection