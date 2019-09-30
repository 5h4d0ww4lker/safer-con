@extends('administrator.master')
@section('title', 'Add Member')

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            MEMBER
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/people/super_admins') }}">Member</a></li>
            <li class="active">Add Member</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add  member</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('members/store') }}" method="post" name="super_admin_add_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
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
                            @else
                            <p class="text-yellow">Enter  member details. All (*)field are required.</p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                         

                            <label for="full_name">Full Name <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" placeholder="Enter name..">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           

                            

                             <label for="gender">Gender <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" selected disabled>Select one</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="phone">Contact No <span class="text-info">(Format: +251-911-123456)</span><span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('contact_no_one') ? ' has-error' : '' }} has-feedback">
                                <input type="tel" name="phone" pattern="(\+[0-9]{3}-[0-9]{3}-[0-9]{6})" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter contact no..">
                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>

     
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email address..">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                             
                           
                            <!-- /.form-group -->

                           
                            
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                           
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">

                           

                           
                            <label for="address">Address</label>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" placeholder="Enter address.">
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="datepicker4">Joining Date<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_date') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" class="form-control pull-right" id="datepicker4" placeholder="yyyy-mm-dd">
                                </div>
                                @if ($errors->has('joining_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_date') }}</strong>
                                </span>
                                @endif
                            </div>
                    
                            <!-- /.form-group --> <label for="profile_picture">Profile Picture <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }} has-feedback">
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                                <input type="hidden" name="profile_picture" value="">
                                @if ($errors->has('profile_picture'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('profile_picture') }}</strong>
                                </span>
                                @endif
                            </div>

                           

                        </div>
                        <!-- /.col -->
    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ url('/people/super_admins') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> Cancel</a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> Add</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">

    $('#department_id').on('change', function(e){
        console.log(e);
        var department_id = e.target.value;
 
        $.get('{{ url('information') }}/create/ajax-state?department_id=' + department_id, function(data) {
            console.log(data);
            $('#designation_id').empty();
            $.each(data, function(index,subCatObj){
              
                $('#designation_id').append('<option value="'+subCatObj.id+'">'+subCatObj.designation+'</option>');
                console.log("Found");
                console.log(subCatObj.designation);
            });
        });
    });
</script>


<script type="text/javascript">
    document.forms['super_admin_add_form'].elements['gender'].value = "{{ old('gender') }}";

   
    document.forms['super_admin_add_form'].elements['role'].value = "{{ old('role') }}";
    document.forms['super_admin_add_form'].elements['joining_position'].value = "{{ old('joining_position') }}";
    document.forms['super_admin_add_form'].elements['marital_status'].value = "{{ old('marital_status') }}";
</script>
@endsection
