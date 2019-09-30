@extends('administrator.master')
@section('title', 'Members')

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
            Members
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Members</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Members</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
            @permission('add-member')
                <a href="{{ url('/members/create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Add </a>
                       
                @endpermission   
               
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
                             <th width="">Picture</th>
                            <th width="">Name</th>
                            
                            <th width="" class="text-center">Joining Date</th>
                            <th width="" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ $sl = 1 }}
                        @foreach($members as $member)
                        <tr>
                            
                            <td>{{ $member['membership_id'] }}</td>
                            
                             <td width="15%"><img src="{{ url('public/profile_picture/' . $member['profile_picture']) }}" class="" width="100%" height="100px"></td>
                            <td>{{ $member['full_name'] }}</td>
                            
                            <td class="text-center">{{ date("d F Y", strtotime($member['joining_date'])) }}</td>
                           
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                    @permission('manage-member')
                                        <li><a href="{{ url('/members/details/' . $member['id']) }}"><i class="icon fa fa-file-text"></i> Details</a></li>
                                        @endpermission  
                                        @permission('edit-member')
                                        <li><a href="{{ url('/members/edit/' . $member['id']) }}"><i class="icon fa fa-edit"></i> Edit</a></li>
                                        @endpermission  
                                        @permission('delete-member')
                                        <li><a href="{{ url('/members/delete/' . $member['id']) }}" onclick="return confirm('Are you sure to delete this ?');"><i class="icon fa fa-trash"></i> Delete</a></li>
                                        @endpermission  
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