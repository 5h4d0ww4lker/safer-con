@extends('master')
@section('title', 'Dashboard')

@section('main_content')
<style type="text/css">
  .modal-title {
    font-weight: bold;
  }

  .bg-grey {
    background-color: #BDBDBD;
  }

  .users-list>li {
    width: 10%;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
 
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ count($users) }}</h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{ url('/setting/super_admins') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ count($orders) }}</h3>

            <p>Orders</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{ route('orders.order.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3>{{ count($transactions) }}</h3>

            <p>Transactions</p>
          </div>
          <div class="icon">
            <i class="icon_currency"></i>
          </div>
          <a href="{{ route('transactions.transaction.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ count($items) }}</h3>

            <p>Items</p>
          </div>
          <div class="icon">
            <i class="fa fa-image"></i>
          </div>
          <a href="{{ route('items.item.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>


    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua">
            <i class="ion ion-ios-list-outline"><a href="{{ route('categories.category.index') }}">
                <h6 style="color:#FFFFFF">More info<i class="fa fa-arrow-circle-right"></i></h6>
              </a></i></span>

          <div class="info-box-content">

            <span class="info-box-text">Categories</span>

            <span class="info-box-number">{{ count($categories) }}</span>
          </div>


          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->

      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="ion ion-ios-grid-view"><a href="{{ route('brands.brand.index') }}">
                <h6 style="color:#FFFFFF">More info<i class="fa fa-arrow-circle-right"></i></h6>
              </a></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Brands</span>
            <span class="info-box-number">{{ count($brands) }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-person"><a href="{{ route('credits.credit.index') }}">
                <h6 style="color:#FFFFFF">More info<i class="fa fa-arrow-circle-right"></i></h6>
              </a></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Credits</span>
            <span class="info-box-number">{{ count($credits) }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->


      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-briefcase"><a href="{{ url('/credit_requests.credit_request.index') }}">
                <h6 style="color:#FFFFFF">More info<i class="fa fa-arrow-circle-right"></i></h6>
              </a></i></span>


          <div class="info-box-content">
            <span class="info-box-text">Credit Requests</span>
            <span class="info-box-number">{{ count($credit_requests) }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- Main row -->
 



  <div class="row">
   
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Orders By Status</div>


        {!!$charts5->html() !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Orders</div>


        {!!$charts2->html() !!}
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Transactions By Status</div>


        {!!$charts->html() !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Transactions Per Month</div>


        {!!$charts3->html() !!}
      </div>
    </div>




  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Users By Status</div>


        {!!$charts6->html() !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Users Per Month</div>


        {!!$charts4->html() !!}
      </div>
    </div>




  </div>

</div>


{!! Charts::scripts() !!}
{!! $charts->script() !!}
{!! $charts2->script() !!}
{!! $charts3->script() !!}

{!! $charts4->script() !!}
{!! $charts5->script() !!}
{!! $charts6->script() !!}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />


<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>


@endsection