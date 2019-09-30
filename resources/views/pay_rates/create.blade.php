@extends('master')

@section('main_content')
@section('title', 'Pay Rates')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Pay Rates        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Pay Rates</a></li>
            <li class="active">Add pay rate</li>
        </ol>
    </section>

   <!-- Main content -->
   <section class="content col-md-8">

<!-- SELECT2 EXAMPLE -->
<div class="box box-default col-md-offset-2  col-md-6">
    <div class="box-header with-border">
        <h3 class="box-title">Add pay rate</h3>

      
    </div>

            <form method="POST" action="{{ route('pay_rates.pay_rate.store') }}" accept-charset="UTF-8" id="create_pay_rate_form" name="create_pay_rate_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('pay_rates.form', [
                                        'payRate' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
@endsection


