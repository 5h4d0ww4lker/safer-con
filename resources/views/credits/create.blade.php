@extends('master')

@section('main_content')
@section('title', 'Credits')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Credit
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Credit</a></li>
            <li class="active">Add Credit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6" >
            <div class="box-header with-border">
                <h3 class="box-title">Add Credit</h3>

              
            </div>
            <!-- /.box-header -->

            <form method="POST" action="{{ route('credits.credit.store') }}" accept-charset="UTF-8" id="create_credit_form" name="create_credit_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('credits.form', [
                                        'credit' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
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

