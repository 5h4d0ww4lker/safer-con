@extends('master')

@section('main_content')
@section('title', 'Abouts')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Abouts
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Abouts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage abouts</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <a href="{{ route('abouts.about.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>


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

                    <button></button>
                </p>

            </form>
            <div class="table-responsive">



                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Label</th>
                            <th>Description</th>
                            <th>Status</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($abouts as $about)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $about->label }}</td>
                            <td>{{ $about->description }}</td>

                            <td>@if($about->status == 'Active')
                                <span class="label label-success">Active</span>
                                @else
                                <span class="label label-danger">Inactive</span>
                                @endif


                            </td>

                            <td>

                                <form method="POST" action="{!! route('abouts.about.destroy', $about->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('abouts.about.show', $about->id ) }}" class="btn btn-info" title="Show About">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('abouts.about.edit', $about->id ) }}" class="btn btn-primary" title="Edit About">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete About" onclick="return confirm(&quot;Click Ok to delete About.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <div class="box-footer">
                {!! $abouts->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection