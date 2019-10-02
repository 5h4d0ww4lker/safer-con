@extends('master')

@section('main_content')
@section('title', 'Sub Categories')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sub Caregories
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>People</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage sub categories</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @permission('add_sub_category')
                <a href="{{ route('sub_categories.sub_category.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>

                @endpermission

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
            <form action="{{ url('people/employees') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                    <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" name="start_date" type="text" id="datepicker3" />
                    <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" name="end_date" id="datepicker4" />
                        <!-- <input type="hidden" name="table" value="employees"> 
     <input type="hidden" name="request" value="people/employees">  -->
                        <button type="submit" class="btn btn-primary btn-filter"><i class="icon fa fa-filter"></i> Filter</button>
                </p>

            </form>
            <div class="table-responsive">

                <table id="example1" class="table table-striped ">
                    <thead>
                        <tr>
                            <th width="15%">#</th>
                            <th>Sub Category</th>
                            <th>Category</th>
                            <th>Created By</th>
                            <th>Created At</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1 ?>
                        @foreach($subCategories as $subCategory)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{ $subCategory->name }}</td>
                            <td>{{ optional($subCategory->category)->name }}</td>
                            <td>{{ $subCategory->creator->name }}</td>
                            <td>{{ $subCategory->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('sub_categories.sub_category.destroy', $subCategory->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        @permission('show_sub_category')
                                        <a href="{{ route('sub_categories.sub_category.show', $subCategory->id ) }}" class="btn btn-info" title="Show Sub Category">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('edit_sub_category')
                                        <a href="{{ route('sub_categories.sub_category.edit', $subCategory->id ) }}" class="btn btn-primary" title="Edit Sub Category">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('delete_sub_category')
                                        <button type="submit" class="btn btn-danger" title="Delete Sub Category" onclick="return confirm(&quot;Click Ok to delete Sub Category.&quot;)">
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
                {!! $subCategories->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection