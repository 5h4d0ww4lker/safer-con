@extends('master')

@section('main_content')
@section('title', 'Landing Pages')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Landing Pages        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Landing Pages</a></li>
            <li class="active">Add Landing Page</li>
        </ol>
    </section>

    <section class="content col-md-8">

<!-- SELECT2 EXAMPLE -->
<div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Add Landing Page</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
          
            <form method="POST" action="{{ route('landing_pages.landing_page.store') }}" accept-charset="UTF-8" id="create_landing_page_form" name="create_landing_page_form" class="form-horizontal" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            @include ('landing_pages.form', [
                                        'landingPage' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
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


