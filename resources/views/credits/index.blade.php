@extends('master')

@section('main_content')
@section('title', 'Credits')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Credits
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Credits</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage credits</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('credits.credit.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                <div class="btn-group pull-right">
                    <button type="button" class="tip btn btn-info btn-flat pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Reports <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ url('/credits/pdf') }}"><i class="icon fa fa-file"></i> PDF</a></li>
                        <li><a href="{{ url('/credits/excel') }}"><i class="icon fa fa-list"></i> Excel</a></li>
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
            <form action="{{ route('credits.credit.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
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

                <div class="table-responsive">

                    <table id="example1" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>On Hold</th>
                                <th>Created By</th>
                                <th>Updated By</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1 ?>
                            @foreach($credits as $credit)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{ optional($credit->user)->name }}&nbsp;{{ optional($credit->user)->father_name }}</td>
                                <td>{{ $credit->amount }}</td>
                                <td>{{ $credit->on_hold }}</td>

                                <td>{{ optional($credit->creator)->name }}</td>
                                <td>{{ optional($credit->updater)->name }}</td>

                                <td>

                                    <form method="POST" action="{!! route('credits.credit.destroy', $credit->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            @permission('edit_credit')
                                            <a href="{{ route('credits.credit.edit', $credit->id ) }}" class="btn btn-primary" title="Edit Credit">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            @endpermission
                                            @permission('delete_credit')
                                            <button type="submit" class="btn btn-danger" title="Delete Credit" onclick="return confirm(&quot;Click Ok to delete Credit.&quot;)">
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
                    {!! $credits->render() !!}
                </div>



            </div>
    </section>
</div>
@endsection