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


   
    <!-- /.row -->


    <!-- Main row -->
 



  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Orders By Status</div>


        {!!$charts4->html() !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Orders Per Month</div>


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


</div>


{!! Charts::scripts() !!}
{!! $charts->script() !!}
{!! $charts2->script() !!}
{!! $charts3->script() !!}
{!! $charts4->script() !!}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />


<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>


@endsection