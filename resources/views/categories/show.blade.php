@extends('master')

@section('main_content')
@section('title', ' Categories')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Category</a></li>
            <li class="active">Add category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-heading clearfix">

                <span class="pull-left">
                    <h4 class="mt-5 mb-5">{{ isset($category->name) ? $category->name : 'Category' }}</h4>
                </span>

                <div class="pull-right">

                    <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
                        <input name="_method" value="DELETE" type="hidden">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="Show All Category">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="Create New Category">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>

                            <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="Edit Category">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>

                            <button type="submit" class="btn btn-danger" title="Delete Category" onclick="return confirm(&quot;Click Ok to delete Category.?&quot;)">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <div class="box-body">
                <dl class="dl-horizontal">

                    <div class="row">

                        <div class="col-md-4">
                            <img src="{{ url($category->default_image) }}" width="200px">


                        </div>
                        <div class="col-md-4">
                            <dt>Category Name</dt>
                            <dd>{{ $category->name }}</dd>

                            <dt>Created By</dt>
                            <dd>{{ optional($category->creator)->name }}</dd>
                            <dt>Updated By</dt>
                            <dd>{{ optional($category->updater)->name }}</dd>
                        </div>

                        <div class="col-md-4">

                            <dt>Created At</dt>
                            <dd>{{ $category->created_at }}</dd>
                            <dt>Updated At</dt>
                            <dd>{{ $category->updated_at }}</dd>
                            <dt>Deleted At</dt>
                            <dd>{{ $category->deleted_at }}</dd>



                        </div>


                </dl>

            </div>
        </div>
    </section>
</div>
@endsection