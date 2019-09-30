@extends('master')

@section('main_content')
@section('title', 'Credit Requests')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Credit Requests        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Credit Requests</a></li>
            <li class="active">Add credit request</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6" >
            <div class="box-header with-border">
                <h3 class="box-title">Add credit request</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <form method="POST" action="{{ route('credit_requests.credit_request.store') }}" accept-charset="UTF-8" id="create_credit_request_form" name="create_credit_request_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('credit_requests.form', [
                                        'creditRequest' => null,
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
