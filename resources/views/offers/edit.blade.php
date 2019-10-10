@extends('master')

@section('main_content')
@section('title', 'Offers')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Offer
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('#') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('#') }}">Offer</a></li>
            <li class="active">Edit Offer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content col-md-8">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-md-offset-2  col-md-6">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Offer</h3>


            </div>
            <!-- /.box-header -->
            <form method="POST" action="{{ route('offers.offer.update', $offer->id) }}" id="edit_offer_form" name="edit_offer_form" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('offers.form', [
                'offer' => $offer,
                ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

@endsection