@extends('master')

@section('main_content')
@section('title', 'Credit Transfers')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Credit Transfers        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Credit Transfers</a></li>
            <li class="active">Add Credit Transfer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">
   
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6" >
            <div class="box-header with-border">
           
                <h3 class="box-title">Add Credit Transfer</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
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
            </div>

            <form method="POST" action="{{ route('credit_transfers.credit_transfer.store') }}" accept-charset="UTF-8" id="create_credit_transfer_form" name="create_credit_transfer_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('credit_transfers.form', [
                                        'creditTransfer' => null,
                                      ])

                <div class="form-group">
                <div class="col-md-offset-2 col-md-8">
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
