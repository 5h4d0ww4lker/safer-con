@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Credit' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('credits.credit.destroy', $credit->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('credits.credit.index') }}" class="btn btn-primary" title="Show All Credit">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('credits.credit.create') }}" class="btn btn-success" title="Create New Credit">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('credits.credit.edit', $credit->id ) }}" class="btn btn-primary" title="Edit Credit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Credit" onclick="return confirm(&quot;Click Ok to delete Credit.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Amount</dt>
            <dd>{{ $credit->amount }}</dd>
            <dt>User</dt>
            <dd>{{ optional($credit->user)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $credit->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $credit->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $credit->deleted_at }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($credit->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($credit->updater)->name }}</dd>

        </dl>

    </div>
</div>

@endsection