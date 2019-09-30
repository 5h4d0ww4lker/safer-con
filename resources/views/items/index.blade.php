@extends('master')

@section('main_content')
@section('title', 'Items')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Items
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>People</a></li>
            <li class="active">Items</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage items</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('items.item.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                <div class="btn-group pull-right">
                    <button type="button" class="tip btn btn-info btn-flat pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Reports <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ url('/items/pdf') }}"><i class="icon fa fa-file"></i> PDF</a></li>
                        <li><a href="{{ url('/items/excel') }}"><i class="icon fa fa-list"></i> Excel</a></li>
                    </ul>
                </div>


                <!-- Notification Box -->
            </div>
            <hr>
            <div class="col-md-12">
                @if (!empty(Session::get('message')))
                <div class="alert alert-success alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                </div>
                @elseif (!empty(Session::get('exception')))
                <div class="alert alert-error alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                </div>
                @endif
            </div>
            <!-- /.Notification Box -->

            <form action="{{ route('items.item.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                    <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" name="start_date" type="text" id="datepicker3" required />
                    <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" name="end_date" id="datepicker4" required />
                        <!-- <input type="hidden" name="table" value="employees"> 
     <input type="hidden" name="request" value="people/employees">  -->
                        <button type="submit" class="btn btn-primary btn-filter"><i class="icon fa fa-filter"></i> Filter</button>
                </p>

            </form>



            <div class="table-responsive">

                <table class="table table-striped " id="example1">
                    <thead>
                        <tr>
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Item Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Brand</th>
                            <th>In Stock</th>

                            <th>Created By</th>
                            <th>Created At</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1 ?>
                        @foreach($items as $item)
                        <tr>
                            <?php
                            $category = \App\Models\Category::find($item->category_id);
                            $sub_category = \App\Models\SubCategory::find($item->sub_category_id);
                            $brand = \App\Models\Brand::find($item->brand_id);
                            $stock = \App\Models\ItemDetail::where('item_id', $item->id)->first();

                            ?>
                            <td>{{$sl++}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->item_price }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $sub_category->name }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                @if($stock->stock >= 5)
                                <span class="label label-success">{{ $stock->stock }} &nbsp; Items Remaining</span>
                                @endif
                                @if($stock->stock < 5 && $stock->stock > 0 )
                                <span class="label label-warning">{{ $stock->stock }} &nbsp; Items Remaining</span>
                                @endif
                                @if($stock->stock < 1)
                                <span class="label label-danger">Out of Stock</span>
                                @endif

                            </td>

                            <td>{{ optional($item->creator)->name }}</td>
                            <td>{{ $item->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('items.item.destroy', $item->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        @permission('show_item')
                                        <a href="{{ route('items.item.show', $item->id ) }}" class="btn btn-info" title="Show Item">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('edit_item')
                                        <a href="{{ route('items.item.edit', $item->id ) }}" class="btn btn-primary" title="Edit Item">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('delete_item')
                                        <button type="submit" class="btn btn-danger" title="Delete Item" onclick="return confirm(&quot;Click Ok to delete Item.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endpermission
                                    </div>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <div class="box-footer">
                {!! $items->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection