@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Transaction' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('transactions.transaction.destroy', $transaction->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('transactions.transaction.index') }}" class="btn btn-primary" title="Show All Transaction">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('transactions.transaction.create') }}" class="btn btn-success" title="Create New Transaction">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('transactions.transaction.edit', $transaction->id ) }}" class="btn btn-primary" title="Edit Transaction">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Transaction" onclick="return confirm(&quot;Click Ok to delete Transaction.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>From</dt>
            <dd>{{ $transaction->from }}</dd>
            <dt>To</dt>
            <dd>{{ $transaction->to }}</dd>
            <dt>Amount</dt>
            <dd>{{ $transaction->amount }}</dd>
            <dt>Status</dt>
            <dd>{{ $transaction->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $transaction->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $transaction->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $transaction->deleted_at }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($transaction->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($transaction->updater)->name }}</dd>

        </dl>

    </div>
</div>

@endsection