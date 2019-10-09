@extends('master')

@section('main_content')
@section('title', 'Abouts')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            About
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">About</a></li>
            <li class="active">Add About</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Add About</h3>


            </div>
            <!-- /.box-header -->

            <form method="POST" action="{{ route('abouts.about.store') }}" accept-charset="UTF-8" id="create_about_form" name="create_about_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('abouts.form', [
                'about' => null,
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