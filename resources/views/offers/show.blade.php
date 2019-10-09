@extends('master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($offer->label) ? $offer->label : 'Offer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('offers.offer.destroy', $offer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('offers.offer.index') }}" class="btn btn-primary" title="Show All Offer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('offers.offer.create') }}" class="btn btn-success" title="Create New Offer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('offers.offer.edit', $offer->id ) }}" class="btn btn-primary" title="Edit Offer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Offer" onclick="return confirm(&quot;Click Ok to delete Offer.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $offer->label }}</dd>
            <dt>Description</dt>
            <dd>{{ $offer->description }}</dd>
            <dt>Image</dt>
            <dd>{{ $offer->image }}</dd>
            <dt>Status</dt>
            <dd>{{ $offer->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($offer->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($offer->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($offer->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $offer->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $offer->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $offer->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection