@extends('master')

@section('main_content')
@section('title', 'Categories')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
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
                <h3 class="box-title">Manage categories</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
            @permission('add_category')
                <a href="{{ route('categories.category.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                    
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
     <form action="#" method="get" name="employee_add_form" enctype="multipart/form-data">
    <p id="date_filter">
         {{ csrf_field() }}
    <!-- <input type="hidden" name="table" value="employees"> 
     <input type="hidden" name="request" value="people/employees">  -->
    <button></button>
    </p>

</form>
            <div class="table-responsive">

                <table id="example1" class="table table-striped ">
                    <thead>
                        <tr><th width="15%">#</th>
                            <th>Name</th>
                            <th>Pay Rate</th>
                            <th>Created By</th>
                            <th>Created At</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php $sl = 1 ?>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->payRate->name }}</td>
                            <td>{{ $category->creator->name }}</td>
                          
                            <td>{{ $category->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                    @permission('show_category')
                                        <a href="{{ route('categories.category.show', $category->id ) }}" class="btn btn-info" title="Show Category">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('edit_category')
                                        <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="Edit Category">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('delete_category')
                                        <button type="submit" class="btn btn-danger" title="Delete Category" onclick="return confirm(&quot;Click Ok to delete Category.&quot;)">
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
            {!! $categories->render() !!}
        </div>
        
      
    
    </div>
    </section>
</div>
@endsection