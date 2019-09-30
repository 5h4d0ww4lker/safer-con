@extends('master')

@section('main_content')
@section('title', 'Item Details')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Item Details        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Item Details</a></li>
            <li class="active">Add detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add detail</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>

            <form method="POST" action="{{ route('item_details.item_detail.store') }}" accept-charset="UTF-8" id="create_item_detail_form" name="create_item_detail_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('item_details.form', [
                                        'itemDetail' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

            </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

@endsection




