@extends('master')

@section('main_content')
@section('title', 'Testimonials')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Testimonial
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Testimonial</a></li>
            <li class="active">Add Testimonial</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Add Testimonial</h3>


            </div>
            <!-- /.box-header -->

            <form method="POST" action="{{ route('testimonials.testimonial.store') }}" accept-charset="UTF-8" id="create_testimonial_form" name="create_testimonial_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('testimonials.form', [
                'testimonial' => null,
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