@extends('master')
@section('title', 'Users')

@section('main_content')
<style type="text/css">
.pro {
    position: relative;
    float: left;
    width:  200px;
    height: 100px;
    background-position: center;
    background-repeat:   no-repeat;
    background-size:     center;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$label}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a>Setting</a></li>
            <li class="active"> {{$label}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage  {{$label}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
          
                <a href="{{ url('/setting/super_admins/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                       
          
               
                <!-- Notification Box -->
            </div>
             <hr>
                <div class="col-md-12">
                @if (\Session::has('error'))
    <div class="alert alert-error">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
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
                    @endif
                </div>
                <!-- /.Notification Box -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          
                            <th width="">ID</th>
                          
                            <th width="">Name</th>
                            <th width="">Phone</th>
                            <th width="">Account Type</th>
                            <th width="">Status</th>
                            
                            <th width="" class="text-center">Added</th>
                          
                            <th width="" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ $sl = 1 }}
                        @foreach($super_admins as $super_admin)
                        <?php
                            $role = \App\Role::find($super_admin['role']);
                           

                            ?>
                        <tr>
                            
                        <td>{{$sl++}}</td>
                            
                          
                            <td>{{ $super_admin['name'] }} &nbsp; {{ $super_admin['father_name'] }}</td>
                            <td>{{ $super_admin['phone_no'] }}</td>
                            <td>{{ $role->name }}</td>

                            <td>@if($super_admin['activation_status'] == 1)
                            <span class="label label-success">Active</span>
                                @else
                                <span class="label label-danger">Inactive</span>
                                @endif


                            </td>
                            
                            <td class="text-center">{{ date("d F Y", strtotime($super_admin['created_at'])) }}</td>
                          
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                   
                                        <li><a href="{{ url('/setting/super_admins/details/' . $super_admin['id']) }}"><i class="icon fa fa-file-text"></i> Details</a></li>
                                      
                                        <li><a href="{{ url('/setting/super_admins/edit/' . $super_admin['id']) }}"><i class="icon fa fa-edit"></i> Edit</a></li>
                                      
                                        <li><a href="{{ url('/setting/super_admins/delete/' . $super_admin['id']) }}" onclick="return confirm('Are you sure to delete this ?');"><i class="icon fa fa-trash"></i> Delete</a></li>
                                      
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
   
<script type="text/javascript">
// $(function() {
//   var oTable = $('#example1').DataTable({
//     "oLanguage": {
//       "sSearch": "Filter Data"
//     },
//     "iDisplayLength": -1,
//     "sPaginationType": "full_numbers",

//   });




//   $("#datepicker_from").datepicker({
//     showOn: "button",
//     buttonImage: "images/calendar.gif",
//     buttonImageOnly: false,
//     "onSelect": function(date) {
//       minDateFilter = new Date(date).getTime();
//       oTable.fnDraw();
//     }
//   }).keyup(function() {
//     minDateFilter = new Date(this.value).getTime();
//     oTable.fnDraw();
//   });

//   $("#datepicker_to").datepicker({
//     showOn: "button",
//     buttonImage: "images/calendar.gif",
//     buttonImageOnly: false,
//     "onSelect": function(date) {
//       maxDateFilter = new Date(date).getTime();
//       oTable.fnDraw();
//     }
//   }).keyup(function() {
//     maxDateFilter = new Date(this.value).getTime();
//     oTable.fnDraw();
//   });

// });

// // Date range filter
// minDateFilter = "";
// maxDateFilter = "";

// $.fn.dataTableExt.afnFiltering.push(
//   function(oSettings, aData, iDataIndex) {
//     if (typeof aData._date == 'undefined') {
//       aData._date = new Date(aData[0]).getTime();
//     }

//     if (minDateFilter && !isNaN(minDateFilter)) {
//       if (aData._date < minDateFilter) {
//         return false;
//       }
//     }

//     if (maxDateFilter && !isNaN(maxDateFilter)) {
//       if (aData._date > maxDateFilter) {
//         return false;
//       }
//     }

//     return true;
//   }
// );
// </script>
@endsection