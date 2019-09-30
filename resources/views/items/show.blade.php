@extends('master')

@section('main_content')
@section('title', ' Items')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Item</a></li>
            <li class="active">Show item</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="box box-default">
    <div class="box-heading clearfix">

        <span class="pull-left">
            <!-- <h4 class="mt-5 mb-5">{{ isset($item->name) ? $item->name : 'Item' }}</h4> -->
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('items.item.destroy', $item->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('items.item.index') }}" class="btn btn-primary" title="Show All Item">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('items.item.create') }}" class="btn btn-success" title="Create New Item">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('items.item.edit', $item->id ) }}" class="btn btn-primary" title="Edit Item">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Item" onclick="return confirm(&quot;Click Ok to delete Item.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="box-body">
        <dl class="dl-horizontal">
        <?php
$category = \App\Models\Category::find($item->category_id)->name;
$sub_category = \App\Models\SubCategory::find($item->sub_category_id)->name;
$brand = \App\Models\Brand::find($item->brand_id)->name;

?>
        <div class="row">
            <div class="col-md-6">
            <dt>Name</dt>
            <dd>{{ $item->name }}</dd>
            <dt>Item Price</dt>
            <dd>{{ $item->item_price }}</dd>
            <dt>Category</dt>
            <dd>{{ $category }}</dd>
            <dt>Sub Category</dt>
            <dd>{{ $sub_category  }}</dd>
            <dt>Brand</dt>
            <dd>{{ $brand  }}</dd>
            </div>

            <div class="col-md-6">
            <dt>Created By</dt>
            <dd>{{ optional($item->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($item->updater)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $item->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $item->updated_at }}</dd>
           
            </div>

            
           
           
         
           
        </div>

<div class="row">
<img src="{{ url($item->file_1) }}"  width="200px">
<img src="{{ url($item->file_2) }}"  width="200px">
<img src="{{ url($item->file_3) }}"  width="200px">
<img src="{{ url($item->file_4) }}"  width="200px">
<img src="{{ url($item->file_5) }}"  width="200px">
<img src="{{ url($item->file_6) }}"  width="200px">
</div>

        </dl>
    </div>
    </div>
</div>

@endsection