@extends('administrator.master')
@section('title', 'Member  details')

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            MEMBERS
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>Member</a></li>
            <li class="active">Details</li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Member  details</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="{{ url('/members') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
            <hr>
            <div id="printable_area">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <p style="padding-top: 40px; font-weight: small;">
                                <b>Full Name: </b>{{ $member->full_name }} 
                                <br>
                                <b>Member ID:</b> {{ $member->membership_id }}
                                <br>
                                

                                <br>
                                
                               
                            </p>
                        </td>
                        <td width="17%">
                            @if(!empty($member->profile_picture))
                            <img src="{{ url('public/profile_picture/' . $member->profile_picture) }}"  width="100%">
                            @else
                            <img src="{{ url('public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail" width="160px">
                            @endif

                            
                        </td>

                       
                    </tr>
                </table>
                <hr>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $member->full_name }}</td>
                        </tr>
                        
                        <tr>
                            <td>Contact No</td>
                            <td>{{ $member->phone }}</td>
                        </tr>
                       
                      
                        <tr>
                            <td>Email</td>
                            <td>{{ $member->email }}</td>
                        </tr>
                       
                        
                        
                        <tr>
                            <td>Gender</td>
                            <td>
                                @if($member->gender == 'm')
                                <p>Male</p>
                                @else
                                <p>Female</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $member->address }}</td>
                        </tr>

                        <tr>
                            <td>Joining Date</td>
                            <td>{{ $member->joining_date }}</td>
                        </tr>
                       
                        
                        <tr>
                            <td>Created By</td>
                            <td>{{ $created_by->name }}</td>
                        </tr>
                        <tr>
                            <td>Date Added</td>
                            <td>{{ date("D d F Y - h:ia", strtotime($member->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td>Last Updated</td>
                            <td>{{ date("D d F Y - h:ia", strtotime($member->updated_at)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

               <!--  <div class="btn-group">
                    <a href="{{ url('/members/download-pdf/' . $member->id) }}" class="tip btn btn-primary btn-flat" title="" data-original-title="PDF">
                        <i class="fa fa-file-pdf-o"></i>
                        <span class="hidden-sm hidden-xs"> PDF</span>
                    </a>
                </div> -->
                @permission('edit-member')
                <div class="btn-group">
                    <a href="{{ url('/members/edit/' . $member->id) }}" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-sm hidden-xs"> Edit</span>
                    </a>
                </div>

                @endpermission   
                @permission('delete-member')
                <div class="btn-group">
                    <a href="{{ url('/members/delete/' . $member->id) }}" class="tip btn btn-danger btn-flat" data-toggle="tooltip" data-original-title="Click to delete" onclick="return confirm('Are you sure to delete this ?');">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> Delete</span>
                    </a>
                </div>

                @endpermission   
            </div>
            <!-- /.End Button -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
@endsection