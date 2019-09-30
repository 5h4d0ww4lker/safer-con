@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($bank->name) ? $bank->name : 'Bank' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('banks.bank.destroy', $bank->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('banks.bank.index') }}" class="btn btn-primary" title="Show All Bank">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('banks.bank.create') }}" class="btn btn-success" title="Create New Bank">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('banks.bank.edit', $bank->id ) }}" class="btn btn-primary" title="Edit Bank">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Bank" onclick="return confirm(&quot;Click Ok to delete Bank.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $bank->name }}</dd>
            <dt>Account No</dt>
            <dd>{{ $bank->account_no }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($bank->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($bank->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($bank->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $bank->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $bank->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $bank->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection