@extends('master')

@section('main_content')
@section('title', 'Sub Categories')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sub Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Sub Category</a></li>
            <li class="active">Show sub category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="box box-default">
    <div class="box-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($category->name) ? $category->name : 'Sub Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sub_categories.sub_category.destroy', $subCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sub_categories.sub_category.index') }}" class="btn btn-primary" title="Show All Sub Category">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sub_categories.sub_category.create') }}" class="btn btn-success" title="Create New Sub Category">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sub_categories.sub_category.edit', $subCategory->id ) }}" class="btn btn-primary" title="Edit Sub Category">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sub Category" onclick="return confirm(&quot;Click Ok to delete Sub Category.?&quot;)">
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
    <img src="{{ url($subCategory->default_image) }}"  width="200px">
                                         
              
                  </div>
    <div class="col-md-4">
    <dt>Sub Category Name</dt>
            <dd>{{ $subCategory->name }}</dd>
            <dt>Category Name</dt>
            <dd>{{ optional($subCategory->category)->name }}</dd>
         
       
          
        
            
    </div> <div class="col-md-4">
    <dt>Created At</dt>
            <dd>{{ $subCategory->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $subCategory->updated_at }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($subCategory->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($subCategory->updater)->name }}</dd>
</div>
        </dl>

    </div>
</div>
</div>
@endsection