@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($partner->label) ? $partner->label : 'Partner' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('partners.partner.destroy', $partner->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('partners.partner.index') }}" class="btn btn-primary" title="Show All Partner">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('partners.partner.create') }}" class="btn btn-success" title="Create New Partner">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('partners.partner.edit', $partner->id ) }}" class="btn btn-primary" title="Edit Partner">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Partner" onclick="return confirm(&quot;Click Ok to delete Partner.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $partner->label }}</dd>
            <dt>Image</dt>
            <dd>{{ $partner->image }}</dd>
            <dt>Status</dt>
            <dd>{{ $partner->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($partner->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($partner->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($partner->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $partner->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $partner->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $partner->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection