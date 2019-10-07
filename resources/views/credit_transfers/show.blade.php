@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Credit Transfer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('credit_transfers.credit_transfer.destroy', $creditTransfer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('credit_transfers.credit_transfer.index') }}" class="btn btn-primary" title="Show All Credit Transfer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('credit_transfers.credit_transfer.create') }}" class="btn btn-success" title="Create New Credit Transfer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('credit_transfers.credit_transfer.edit', $creditTransfer->id ) }}" class="btn btn-primary" title="Edit Credit Transfer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Credit Transfer" onclick="return confirm(&quot;Click Ok to delete Credit Transfer.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>From</dt>
            <dd>{{ $creditTransfer->from }}</dd>
            <dt>To</dt>
            <dd>{{ $creditTransfer->to }}</dd>
            <dt>Amount</dt>
            <dd>{{ $creditTransfer->amount }}</dd>
            <dt>Created At</dt>
            <dd>{{ $creditTransfer->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $creditTransfer->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $creditTransfer->deleted_at }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($creditTransfer->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($creditTransfer->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($creditTransfer->deletedBy)->id }}</dd>

        </dl>

    </div>
</div>

@endsection