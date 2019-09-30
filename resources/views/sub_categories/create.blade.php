@extends('master')

@section('main_content')
@section('title', 'Sub Categories')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Sub Category</a></li>
            <li class="active">Add sub category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6" >
            <div class="box-header with-border">
                <h3 class="box-title">Add sub category</h3>

              
            </div>
            <!-- /.box-header -->

            <form method="POST" action="{{ route('sub_categories.sub_category.store') }}" accept-charset="UTF-8" id="create_sub_category_form" name="create_sub_category_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('sub_categories.form', [
                                        'subCategory' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
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



