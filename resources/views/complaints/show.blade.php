@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($complaint->title) ? $complaint->title : 'Complaint' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('complaints.complaint.destroy', $complaint->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('complaints.complaint.index') }}" class="btn btn-primary" title="Show All Complaint">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('complaints.complaint.create') }}" class="btn btn-success" title="Create New Complaint">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('complaints.complaint.edit', $complaint->id ) }}" class="btn btn-primary" title="Edit Complaint">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Complaint" onclick="return confirm(&quot;Click Ok to delete Complaint.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($complaint->user)->id }}</dd>
            <dt>Merchant</dt>
            <dd>{{ optional($complaint->merchant)->name }}</dd>
            <dt>Title</dt>
            <dd>{{ $complaint->title }}</dd>
            <dt>Description</dt>
            <dd>{{ $complaint->description }}</dd>
            <dt>Status</dt>
            <dd>{{ $complaint->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $complaint->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $complaint->updated_at }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($complaint->updater)->name }}</dd>

        </dl>

    </div>
</div>

@endsection