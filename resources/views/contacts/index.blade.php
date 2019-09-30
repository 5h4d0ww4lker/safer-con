@extends('master')

@section('main_content')
@section('title', 'Contacts')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contacts
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>People</a></li>
            <li class="active">Contacts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage contacts</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!-- <a href="{{ route('contacts.contact.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a> -->



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
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Content</th>
                            <th>Created At</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl = 1?>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->website }}</td>
                            <td>{{ $contact->content }}</td>
                            <td>{{ $contact->created_at }}</td>
                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <div class="box-footer">
                {!! $contacts->render() !!}
            </div>



        </div>
    </section>
</div>
@endsection