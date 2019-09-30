@extends('master2')
@section('title', 'Add Merchant')

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            MERCHANT
        </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Merchant Registration</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/store_merchant') }}" method="post" name="super_admin_add_form" enctype="multipart/form-data">
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
                         

                            <label for="name">First Name <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name..">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
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
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">

                                
                              
                        
                            <label for="father_name">Father's Name</label>
                            <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{ old('father_name') }}" placeholder="Enter father's name..">
                                @if ($errors->has('father_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('father_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="name">Phone No <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="phone_number_1" id="name" class="form-control" value="" placeholder="Enter phone_number.." required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <label for="email">Password <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <input type="password" name="password" id="email" class="form-control" value="{{ old('password') }}" placeholder="Enter Password..">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                           

                        </div>
                        <!-- /.col -->
    
                </div>


                <div class="row">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="ctown">Region <span>*</span></label>
                                <select class="form-control" id="ctown" name="region" required>
                                   
                                    <option value="Addis Ababa">Addis Ababa</option>
                                    <option value="Afar">Afar</option>
                                    <option value="Amhara">Amhara</option>
                                    <option value="Benishangul Gumz">Benishangul Gumz</option>
                                    <option value="Diredawa">Diredawa</option>
                                    <option value="Gambela">Gambela</option>
                                    <option value="Harari">Harari</option>
                                    <option value="Oromia">Oromia</option>
                                    <option value="Somali">Somali</option>
                                    <option value="SNNP">SNNP</option>
                                    <option value="Tigray">Tigray</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label for="name">City <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="city" id="name" class="form-control" value="" placeholder="Enter city.." required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Sub City <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="sub_city" id="name" class="form-control" value="" placeholder="Enter sub city.." required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                        <label for="name">Location <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="location" id="name" class="form-control" value="" placeholder="Enter location.." required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="row">
                   
                    <div class="col-md-6">
                        <label for="name">Building <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="building" id="name" class="form-control" value="" placeholder="Enter building.." required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


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




@endsection
