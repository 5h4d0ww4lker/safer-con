@extends('master')

@section('main_content')
@section('title', 'Pay Rates')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pay Rates </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Pay Rates</a></li>
            <li class="active">Edit pay rate</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Edit pay rate</h3>


            </div>
            <form method="POST" action="{{ route('pay_rates.pay_rate.update', $payRate->id) }}" id="edit_pay_rate_form" name="edit_pay_rate_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('pay_rates.form', [
                'payRate' => $payRate,
                ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
</div>
</section>
<!-- /.content -->
</div>
@endsection