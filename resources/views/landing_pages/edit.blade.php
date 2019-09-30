@extends('master')

@section('main_content')
@section('title', 'Landing Pages')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Landing Pages </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Landing Pages</a></li>
            <li class="active"> t Landing Page</li>
        </ol>
    </section>

    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Landing Page</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <form method="POST" action="{{ route('landing_pages.landing_page.update', $landingPage->id) }}" id="edit_landing_page_form" name="edit_landing_page_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('landing_pages.form', [
                'landingPage' => $landingPage,
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