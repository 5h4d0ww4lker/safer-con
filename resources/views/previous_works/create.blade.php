@extends('master')

@section('main_content')
@section('title', 'Previous Works')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Previous Work
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Previous Work</a></li>
            <li class="active">Add Previous Work</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Add Previous Work</h3>


            </div>
            <!-- /.box-header -->

            <form method="POST" action="{{ route('previous_works.previous_work.store') }}" accept-charset="UTF-8" id="create_previous_work_form" name="create_previous_work_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('previous_works.form', [
                'previousWork' => null,
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