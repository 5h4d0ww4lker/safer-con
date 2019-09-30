@extends('master')

@section('main_content')
@section('title', 'Brands')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Brands
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Brands</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage brands</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('brands.brand.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
               


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
            <form action="#" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                   
                        <button ></button>
                </p>

            </form>
            <div class="table-responsive">

                <table class="table table-striped "  id="example1">
                    <thead>
                        <tr>
                            <th width="15%">#</th>
                            <th>Brand Name</th>
                            <th>Created By</th>
                            <th>Created At</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody> <?php $sl = 1 ?>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->creator->name }}</td>
                            <td>{{ $brand->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('brands.brand.destroy', $brand->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        @permission('show_brand')
                                        <a href="{{ route('brands.brand.show', $brand->id ) }}" class="btn btn-info" title="Show Brand">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('edit_brand')
                                        <a href="{{ route('brands.brand.edit', $brand->id ) }}" class="btn btn-primary" title="Edit Brand">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('delete_brand')
                                        <button type="submit" class="btn btn-danger" title="Delete Brand" onclick="return confirm(&quot;Click Ok to delete Brand.&quot;)">
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
                {!! $brands->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection