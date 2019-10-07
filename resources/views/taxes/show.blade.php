@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($tax->name) ? $tax->name : 'Tax' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('taxes.tax.destroy', $tax->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('taxes.tax.index') }}" class="btn btn-primary" title="Show All Tax">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('taxes.tax.create') }}" class="btn btn-success" title="Create New Tax">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('taxes.tax.edit', $tax->id ) }}" class="btn btn-primary" title="Edit Tax">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Tax" onclick="return confirm(&quot;Click Ok to delete Tax.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $tax->name }}</dd>
            <dt>Rate</dt>
            <dd>{{ $tax->rate }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($tax->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($tax->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($tax->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $tax->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $tax->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $tax->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection