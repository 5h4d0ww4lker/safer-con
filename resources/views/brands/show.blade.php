@extends('master')

@section('main_content')
@section('title', ' Brands')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Brand
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Brand</a></li>
            <li class="active">Show brand</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="box box-default">
    <div class="box-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($brand->name) ? $brand->name : 'Brand' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('brands.brand.destroy', $brand->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('brands.brand.index') }}" class="btn btn-primary" title="Show All Brand">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('brands.brand.create') }}" class="btn btn-success" title="Create New Brand">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('brands.brand.edit', $brand->id ) }}" class="btn btn-primary" title="Edit Brand">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Brand" onclick="return confirm(&quot;Click Ok to delete Brand.?&quot;)">
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
    <img src="{{ url($brand->default_image) }}"  width="200px">
                                         
              
                  </div>
    <div class="col-md-4">
    <dt>Brand Name</dt>
            <dd>{{ $brand->name }}</dd>

            <dt>Description</dt>
            <dd>{{ $brand->description }}</dd>
            
            <dt>Created By</dt>
            <dd>{{ optional($brand->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($brand->updater)->name }}</dd>
    </div>

    <div class="col-md-4">
                  
    <dt>Created At</dt>
            <dd>{{ $brand->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $brand->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $brand->deleted_at }}</dd>
            
                           

    </div>

 
        </dl>

    </div>
</div>
    </section>
</div>
@endsection