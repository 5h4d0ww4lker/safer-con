@extends('master')

@section('main_content')
@section('title', 'Credit Transfers')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Credit Transfers
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>People</a></li>
            <li class="active">Credit Transfers</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Credit Transfers</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @permission('add_credit_transfer')
                <a href="{{ route('credit_transfers.credit_transfer.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                @endpermission



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
            <form action="#" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                
                        <button></button>
                </p>

            </form>

            <div class="table-responsive">
                <table id="example1" class="table table-striped ">
                    <thead>
                        <tr>
                            <th> #</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Transaction ID</th>
                            <th>Status</th>
                            <th>Created At</th>



                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                      

                        $sl = 1 ?>
                        @foreach($creditTransfers as $creditTransfer)
                        <?php
                        $sender =  \App\User::find($creditTransfer->from);
                        $receiever =  \App\User::find($creditTransfer->to);
                     

                        ?>

                        <tr>
                            <td>{{$sl++}}
                            </td>
                            <td>{{ $sender->name }}&nbsp;{{ $sender->father_name }}</td>
                            <td>{{ $receiever->name }}&nbsp;{{ $receiever->father_name }}</td>
                            <td>{{ $creditTransfer->amount }}</td>

                            <td>{{ $creditTransfer->transaction_id }}</td>

                            <td>


<span class="label label-success">Completed</span>



</td>
                            <td>{{$creditTransfer->created_at }}</td>
                           

                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="box-footer">
                {!! $creditTransfers->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection