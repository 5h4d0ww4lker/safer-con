@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Rating' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('ratings.rating.destroy', $rating->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('ratings.rating.index') }}" class="btn btn-primary" title="Show All Rating">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('ratings.rating.create') }}" class="btn btn-success" title="Create New Rating">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('ratings.rating.edit', $rating->id ) }}" class="btn btn-primary" title="Edit Rating">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Rating" onclick="return confirm(&quot;Click Ok to delete Rating.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($rating->user)->id }}</dd>
            <dt>Item</dt>
            <dd>{{ optional($rating->item)->name }}</dd>
            <dt>Rate</dt>
            <dd>{{ $rating->rate }}</dd>
            <dt>Created At</dt>
            <dd>{{ $rating->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection