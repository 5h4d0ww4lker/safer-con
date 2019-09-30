@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Search History' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('search_histories.search_history.destroy', $searchHistory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('search_histories.search_history.index') }}" class="btn btn-primary" title="Show All Search History">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('search_histories.search_history.create') }}" class="btn btn-success" title="Create New Search History">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('search_histories.search_history.edit', $searchHistory->id ) }}" class="btn btn-primary" title="Edit Search History">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Search History" onclick="return confirm(&quot;Click Ok to delete Search History.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($searchHistory->user)->id }}</dd>
            <dt>Search String</dt>
            <dd>{{ $searchHistory->search_string }}</dd>
            <dt>Created At</dt>
            <dd>{{ $searchHistory->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection