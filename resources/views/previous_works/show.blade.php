@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($previousWork->label) ? $previousWork->label : 'Previous Work' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('previous_works.previous_work.destroy', $previousWork->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('previous_works.previous_work.index') }}" class="btn btn-primary" title="Show All Previous Work">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('previous_works.previous_work.create') }}" class="btn btn-success" title="Create New Previous Work">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('previous_works.previous_work.edit', $previousWork->id ) }}" class="btn btn-primary" title="Edit Previous Work">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Previous Work" onclick="return confirm(&quot;Click Ok to delete Previous Work.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $previousWork->label }}</dd>
            <dt>Image</dt>
            <dd>{{ $previousWork->image }}</dd>
            <dt>Status</dt>
            <dd>{{ $previousWork->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($previousWork->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($previousWork->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($previousWork->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $previousWork->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $previousWork->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $previousWork->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection