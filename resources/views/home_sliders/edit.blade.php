@extends('master')

@section('main_content')
@section('title', 'Home Sliders')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home Slider
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Home Slider</a></li>
            <li class="active">Edit Home Slider</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Home Slider</h3>


            </div>
            <!-- /.box-header -->
            <form method="POST" action="{{ route('home_sliders.home_slider.update', $homeSlider->id) }}" id="edit_homeSlider_form" name="edit_homeSlider_form" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('home_sliders.form', [
                'homeSlider' => $homeSlider,
                ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

@endsection