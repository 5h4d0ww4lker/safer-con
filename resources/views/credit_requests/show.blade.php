@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Credit Request' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('credit_requests.credit_request.destroy', $creditRequest->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('credit_requests.credit_request.index') }}" class="btn btn-primary" title="Show All Credit Request">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('credit_requests.credit_request.create') }}" class="btn btn-success" title="Create New Credit Request">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('credit_requests.credit_request.edit', $creditRequest->id ) }}" class="btn btn-primary" title="Edit Credit Request">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Credit Request" onclick="return confirm(&quot;Click Ok to delete Credit Request.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($creditRequest->user)->id }}</dd>
            <dt>Amount</dt>
            <dd>{{ $creditRequest->amount }}</dd>
            <dt>Bank</dt>
            <dd>{{ optional($creditRequest->bank)->id }}</dd>
            <dt>Transaction</dt>
            <dd>{{ optional($creditRequest->transaction)->from }}</dd>
            <dt>Status</dt>
            <dd>{{ $creditRequest->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $creditRequest->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $creditRequest->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $creditRequest->deleted_at }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($creditRequest->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($creditRequest->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($creditRequest->deletedBy)->id }}</dd>

        </dl>

    </div>
</div>

@endsection