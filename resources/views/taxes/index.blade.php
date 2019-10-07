@extends('master')

@section('main_content')
@section('title', 'Taxes')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Taxes
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Taxes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Taxes</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @permission('add_tax')
                <a href="{{ route('taxes.tax.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
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
            <form action="{{ route('taxes.tax.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                                 <button></button>
                </p>

            </form>
            <div class="table-responsive">
                <table id="example1" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Rate</th>
                            
                            <th>Created By</th>
                            <th>Updated By</th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1 ?>
                        @foreach($taxes as $tax)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{ $tax->name }}</td>
                            <td>{{ $tax->rate }}%</td>
                           
                            <td>{{ optional($tax->creator)->name }}</td>
                            <td>{{ optional($tax->updater)->name }}</td>


                            <td>

                                <form method="POST" action="{!! route('taxes.tax.destroy', $tax->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        @permission('edit_tax')
                                        <a href="{{ route('taxes.tax.edit', $tax->id ) }}" class="btn btn-primary" title="Edit Tax">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                        @permission('delete_tax')
                                        <button type="submit" class="btn btn-danger" title="Delete Tax" onclick="return confirm(&quot;Click Ok to delete Tax.&quot;)">
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
                {!! $taxes->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection