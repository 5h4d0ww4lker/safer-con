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
           
            <li class="active">Item Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage item details</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('item_details.item_detail.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
               


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
                <div class="alert alert-warning alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                </div>
                @endif
            </div>
            <!-- /.Notification Box -->
            <form action="#" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                                  <button ></button>
                </p>

            </form>

            <div class="table-responsive">

                <table id="example1" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>In Stock</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Info</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1; ?>
                        @foreach($itemDetails as $itemDetail)
                        <tr><td>{{$sl++}}</td>
                            <td>{{ optional($itemDetail->item)->name }}</td>
                            <td>{{ $itemDetail->description }}</td>
                            <td>{{ $itemDetail->stock }}</td>
                            <td>{{ $itemDetail->size }}</td>
                            <td>{{ $itemDetail->color }}</td>
                            <td>{{ $itemDetail->additional_info }}</td>


                            <td>

                                <form method="POST" action="{!! route('item_details.item_detail.destroy', $itemDetail->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <!-- <a href="{{ route('item_details.item_detail.show', $itemDetail->id ) }}" class="btn btn-info" title="Show Item Detail">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a> -->
                                        @permission('edit_item_details')
                                        <a href="{{ route('item_details.item_detail.edit', $itemDetail->id ) }}" class="btn btn-primary" title="Edit Item Detail">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('delete_item_details')
                                        <button type="submit" class="btn btn-danger" title="Delete Item Detail" onclick="return confirm(&quot;Click Ok to delete Item Detail.&quot;)">
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
                {!! $itemDetails->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection