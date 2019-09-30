@extends('administrator.master')
@section('title', 'Edit team member')

@section('main_content')
<style type="text/css">
.pro {
    position: relative;
    float: left;
    width:  170px;
    height: 150px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TEAM
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/people/employees') }}">Team</a></li>
            <li class="active">Edit team member details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit team member details</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('people/employees/update/'.$employee['id']) }}" method="post" name="employee_edit_form" enctype="multipart/form-data">
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
                            <p class="text-yellow">Enter team member details. All (*)field are required. (Default password for added user is 12345678)</p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">
                         

                            <label for="name">Name <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $employee['name'] }}" placeholder="Enter name..">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="father_name">Father's Name</label>
                            <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $employee['father_name'] }}" placeholder="Enter father's name..">
                                @if ($errors->has('father_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('father_name') }}</strong>
                                </span>
                                @endif
                            </div>


                            <label for="grand_father_name">Grand Father's Name</label>
                            <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="grand_father_name" id="grand_father_name" class="form-control" value="{{ $employee['grand_father_name'] }}" placeholder="Enter grand father's name..">
                                @if ($errors->has('grand_father_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gradn_father_name') }}</strong>
                                </span>
                                @endif
                            </div>
                          
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
                            <!-- /.form-group -->

                           

                            <label for="email">Email <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="email" id="email" class="form-control" value="{{ $employee['email'] }}" placeholder="Enter email address..">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="contact_no_one">Contact No<span class="text-danger">*</span>(Format: +251-911-123456)</label>
                            <div class="form-group{{ $errors->has('contact_no_one') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="contact_no_one" pattern="(\+[0-9]{3}-[0-9]{3}-[0-9]{6})" id="contact_no_one" class="form-control" value="{{ $employee['contact_no_one'] }}" placeholder="Enter contact no..">
                                @if ($errors->has('contact_no_one'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_no_one') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                          
                                <label for="emergency_contact">Emergency Contact</label>(Format: +251-911-123456)
                            <div class="form-group{{ $errors->has('emergency_contact') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="emergency_contact" pattern="(\+[0-9]{3}-[0-9]{3}-[0-9]{6})" id="emergency_contact" class="form-control" value="{{ $employee['emergency_contact'] }}" placeholder="Enter emergency contact no..">
                                @if ($errors->has('emergency_contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emergency_contact') }}</strong>
                                </span>
                                @endif
                            </div>


                                <label for="tin">TIN No</label>
                            <div class="form-group{{ $errors->has('tin') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="tin" id="tin" class="form-control" value="{{ $employee['tin'] }}" placeholder="Enter emergency contact no..">
                                @if ($errors->has('tin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tin') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="datepicker4">Joining Date<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_date') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="joining_date" value="{{ $employee['joining_date'] }}" class="form-control pull-right" id="datepicker4" placeholder="yyyy-mm-dd">
                                </div>
                                @if ($errors->has('joining_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                              <label for="cv">CV<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }} has-feedback">
                                <input type="file" name="cv" id="cv" class="form-control">
                                <input type="hidden" name="cv" value="">
                                @if ($errors->has('cv'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cv') }}</strong>
                                </span>
                                @endif

                                   @if(!empty($employee['cv']))
                                   <object data="{{ url('/public/cv/' . $employee['cv']) }}"></object>
                          

                            @else
                            <img src="{{ url('/public/profile_picture/pdf.png') }}" alt="blank_profile_picture" class="img-responsive pro img-thumbnail">
                            @endif
                            </div>

                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                           
                            <!-- /.form-group -->

                          
                         
                           
                            <!-- /.form-group -->

                              <label for="branch_id">Branch <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }} has-feedback">
                                <select name="branch_id" id="branch_id" class="form-control">

                                    <?php 

                                    $prev_branch = \App\Branch::find($employee['branch_id']);

                                     ?>
                                    <option value="{{$prev_branch->id}}" selected>{{$prev_branch->branch}}</option>
                                    @foreach($branches as $branch)
                                    <option value="{{ $branch['id'] }}">{{ $branch['branch'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('branch_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('branch_id') }}</strong>
                                </span>
                                @endif
                            </div>
                           
                            
                               <label for="department_id">Department <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} has-feedback">
                                <select name="department_id" id="department_id" class="form-control">

                                    <?php 

                                    $prev_department = \App\Department::find($employee['department_id']);

                                     ?>
                                    <option value="{{$prev_department->id}}" selected>{{$prev_department->department}}</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department['id'] }}">{{ $department['department'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('department_id') }}</strong>
                                </span>
                                @endif
                            </div>

                         <label for="designation_id">Designation <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }} has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">

                                    <?php 

                                    $prev_designation = \App\Designation::find($employee['designation_id']);

                                     ?>
                                    <option value="{{$prev_designation->id}}">{{$prev_designation->designation}}</option>
                                   
                                </select>
                                @if ($errors->has('designation_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <!-- /.form-group -->

                            <label for="joining_position">Joining Position <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_position') ? ' has-error' : '' }} has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">

                                     <?php 

                                    $prev_pos = \App\Designation::find($employee['joining_position']);

                                     ?>
                                    <option value="{{$prev_pos->id}}" selected>{{$prev_pos->designation}}</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation['id'] }}">{{ $designation['designation'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('joining_position'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_position') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="marital_status">Marital Status </label>
                            <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }} has-feedback">
                                <select name="marital_status" id="marital_status" class="form-control">
                                     <option value="{{ $employee['marital_status'] }}" selected>{{ $employee['marital_status'] }}</option>
                                  
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                @if ($errors->has('marital_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('marital_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <label for="datepicker">Date of Birth</label>
                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }} has-feedback">
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date_of_birth" class="form-control pull-right" value="{{ $employee['date_of_birth'] }}" id="datepicker3">
                                </div>
                                @if ($errors->has('date_of_birth'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="role">Role<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
                                <select name="role" id="role" class="form-control">
                                      <?php 

                                    $prev_role = \App\Role::find($employee['role']);

                                     ?>


                                    <option value="{{$prev_role->id }}" selected>{{$prev_role->display_name}}</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                              <label for="employement_status">Employement Status </label>
                            <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }} has-feedback">
                                <select name="employement_status" id="employement_status" class="form-control">
                                    <option value="{{$employee['employement_status']}}" selected>{{$employee['employement_status']}}</option>
                                    <option value="Active">Active</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Left">Left</option>
                                    <option value="Retired">Retired</option>
                                    <option value="Retired">Fired</option>
                                </select>
                                @if ($errors->has('employement_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employement_status') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="tin">Finger Print Id</label>
                            <div class="form-group{{ $errors->has('finger_print_id') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="finger_print_id" id="finger_print_id" class="form-control" value="{{ $employee['finger_print_id'] }}" placeholder="Enter finge print Id">
                                @if ($errors->has('tin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tin') }}</strong>
                                </span>
                                @endif
                            </div>
                             <label for="profile_picture">Profile Picture <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }} has-feedback">
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                                <input type="hidden" name="profile_picture" value="">
                                @if ($errors->has('profile_picture'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('profile_picture') }}</strong>
                                </span>
                                @endif

                             @if(!empty($employee['profile_picture']))
                            <img src="{{ url('/public/profile_picture/' . $employee['profile_picture']) }}" alt="$employee['profile_picture']" class="img-responsive img-thumbnail" width="200px" height="100px">
                            @else
                            <img src="{{ url('/public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail" width="250px">
                            @endif
                            </div>
                           
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">

                             <label for="present_address">Present Address</label>
                            <div class="form-group{{ $errors->has('present_address') ? ' has-error' : '' }} has-feedback">
                                <textarea name="present_address" id="present_address" class="form-control textarea" placeholder="Enter present_address..">{{ $employee['present_address'] }}</textarea>
                                @if ($errors->has('present_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('present_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="permanent_address">Permanent Address</label>
                            <div class="form-group{{ $errors->has('permanent_address') ? ' has-error' : '' }} has-feedback">
                                <textarea name="permanent_address" id="permanent_address" class="form-control textarea" placeholder="Enter permanent_address..">{{ $employee['permanent_address'] }}</textarea>
                                @if ($errors->has('permanent_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('permanent_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="academic_qualification">Academic Qualification</label>
                            <div class="form-group{{ $errors->has('academic_qualification') ? ' has-error' : '' }} has-feedback">
                                <textarea name="academic_qualification" id="academic_qualification" class="form-control textarea" placeholder="Enter academic qualification..">{{ $employee['academic_qualification'] }}</textarea>
                                @if ($errors->has('academic_qualification'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('academic_qualification') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="professional_qualification">Professional Qualification</label>
                            <div class="form-group{{ $errors->has('professional_qualification') ? ' has-error' : '' }} has-feedback">
                                <textarea name="professional_qualification" id="professional_qualification" class="form-control textarea" placeholder="Enter professional qualification..">{{ $employee['professional_qualification'] }}</textarea>
                                @if ($errors->has('professional_qualification'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('professional_qualification') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->



                            <label for="experience">Experience</label>
                            <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }} has-feedback">
                                <textarea name="experience" id="experience" class="form-control textarea" placeholder="Enter experience..">{{ $employee['experience'] }}</textarea>
                                @if ($errors->has('experience'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('experience') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                       <!--      <label for="reference">Reference</label>
                            <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }} has-feedback">
                                <textarea name="reference" id="reference" class="form-control textarea" placeholder="Enter reference..">{{ $employee['reference'] }}</textarea>
                                @if ($errors->has('reference'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reference') }}</strong>
                                </span>
                                @endif
                            </div> -->
                            <!-- /.form-group -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('/people/employees') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> Cancel</a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> Update</button>
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
              
                $('#designation_id').append('<option value="'+subCatObj.id+'" selected>'+subCatObj.designation+'</option>');
                console.log("Found");
                console.log(subCatObj.designation);
            });
        });
    });
</script>

    <script type="text/javascript">
        document.forms['employee_edit_form'].elements['gender'].value = "{{ $employee['gender'] }}";
      
        document.forms['employee_edit_form'].elements['marital_status'].value = "{{ $employee['marital_status'] }}";
             document.forms['employee_edit_form'].elements['role'].value = "{{ $employee['role'] }}";
        document.forms['employee_edit_form'].elements['joining_position'].value = "{{ $employee['joining_position'] }}";
    </script>
    @endsection
