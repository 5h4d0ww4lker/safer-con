@extends('master')

@section('main_content')
@section('title', 'Sub Categories')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SubCategory
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Sub Category</a></li>
            <li class="active">Edit sub category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Edit sub category</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <form method="POST" action="{{ route('sub_categories.sub_category.update', $subCategory->id) }}" id="edit_sub_category_form" name="edit_sub_category_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('sub_categories.form', [
                                        'subCategory' => $subCategory,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>
            </div>
    </section>
    </div>

@endsection