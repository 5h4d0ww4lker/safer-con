@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($merchant->name) ? $merchant->name : 'Merchant' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('merchants.merchant.destroy', $merchant->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('merchants.merchant.index') }}" class="btn btn-primary" title="Show All Merchant">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('merchants.merchant.create') }}" class="btn btn-success" title="Create New Merchant">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('merchants.merchant.edit', $merchant->id ) }}" class="btn btn-primary" title="Edit Merchant">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Merchant" onclick="return confirm(&quot;Click Ok to delete Merchant.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $merchant->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $merchant->email }}</dd>
            <dt>Password</dt>
            <dd>{{ $merchant->password }}</dd>
            <dt>Address</dt>
            <dd>{{ $merchant->address }}</dd>
            <dt>Date Of Birth</dt>
            <dd>{{ $merchant->date_of_birth }}</dd>
            <dt>Profile Picture</dt>
            <dd>{{ $merchant->profile_picture }}</dd>
            <dt>Tin</dt>
            <dd>{{ $merchant->tin }}</dd>
            <dt>Role</dt>
            <dd>{{ $merchant->role }}</dd>
            <dt>Activation Status</dt>
            <dd>{{ $merchant->activation_status }}</dd>
            <dt>Deletion Status</dt>
            <dd>{{ $merchant->deletion_status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $merchant->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $merchant->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $merchant->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection