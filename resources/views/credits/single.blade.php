@extends('master')

@section('main_content')
@section('title', 'My Credit Info')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Credit Info
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Credit</a></li>
            <li class="active">My Credit Info</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">My Credit Info</h3>


            </div>
            <!-- /.box-header -->



            <table class="table table-bordered ">

                <tbody>

                    <tr>
                        <td>Available Credit</td>
                        <td>{{$credit_info->amount }}&nbsp;ETB</td>
                    </tr>

                    <tr>
                        <td>Available On Hold</td>
                        <td>{{$credit_info->on_hold }}&nbsp;ETB</td>
                    </tr>

                    <tr>
                        <td><h3>Total</h3></td>
                        <td><h3>{{($credit_info->on_hold ) + ($credit_info->amount)}}&nbsp;ETB</h3></td>
                    </tr>

                </tbody>
            </table>

        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

@endsection