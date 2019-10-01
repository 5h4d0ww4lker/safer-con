@extends('master')

@section('main_content')
@section('title', 'Landing Pages')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Landing Pages
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>People</a></li>
            <li class="active">Landing Pages</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage landingPages</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="{{ route('landing_pages.landing_page.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
              


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

            <form action="{{ route('landing_pages.landing_page.index') }}" method="get" name="employee_add_form" enctype="multipart/form-data">
                <p id="date_filter">
                    {{ csrf_field() }}
                   
                        <button ></button>
                </p>

            </form>



            <div class="table-responsive">

                <table class="table table-striped " id="example1">
                    <thead>
                        <tr>
                        <tr>
                            <th width="5%">#</th>
                           
                            <th>Title</th>
                            <th>Heading</th>
                            <th>Content</th>
                          

                            <th>Created By</th>
                            <th>Created At</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1 ?>
                        @foreach($landingPages as $landingPage)
                        <tr>
                           
                            <td>{{$sl++}}</td>
                            <td>{{ $landingPage->title }}</td>
                            <td>{{ substr($landingPage->heading,0,15) }}..</td>
                            <td>{{ substr($landingPage->content,0,15) }}..</td>
                          

                            <td>{{ optional($landingPage->creator)->name }}</td>
                            <td>{{ $landingPage->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('landing_pages.landing_page.destroy', $landingPage->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                      
                                       
                                        <a href="{{ route('landing_pages.landing_page.edit', $landingPage->id ) }}" class="btn btn-primary" title="Edit Landing Page">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                       
                                        <button type="submit" class="btn btn-danger" title="Delete Landing Page" onclick="return confirm(&quot;Click Ok to delete Landing Page.&quot;)">
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
                {!! $landingPages->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection