@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Notification' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('notifications.notification.destroy', $notification->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('notifications.notification.index') }}" class="btn btn-primary" title="Show All Notification">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('notifications.notification.create') }}" class="btn btn-success" title="Create New Notification">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('notifications.notification.edit', $notification->id ) }}" class="btn btn-primary" title="Edit Notification">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Notification" onclick="return confirm(&quot;Click Ok to delete Notification.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Notify To</dt>
            <dd>{{ $notification->notify_to }}</dd>
            <dt>Content</dt>
            <dd>{{ $notification->content }}</dd>
            <dt>Status</dt>
            <dd>{{ $notification->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $notification->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection