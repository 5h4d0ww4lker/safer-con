@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($landingPage->title) ? $landingPage->title : 'Landing Page' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('landing_pages.landing_page.destroy', $landingPage->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('landing_pages.landing_page.index') }}" class="btn btn-primary" title="Show All Landing Page">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('landing_pages.landing_page.create') }}" class="btn btn-success" title="Create New Landing Page">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('landing_pages.landing_page.edit', $landingPage->id ) }}" class="btn btn-primary" title="Edit Landing Page">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Landing Page" onclick="return confirm(&quot;Click Ok to delete Landing Page.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $landingPage->title }}</dd>
            <dt>Heading</dt>
            <dd>{{ $landingPage->heading }}</dd>
            <dt>Content</dt>
            <dd>{{ $landingPage->content }}</dd>
            <dt>File</dt>
            <dd>{{ $landingPage->file }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($landingPage->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($landingPage->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($landingPage->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $landingPage->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $landingPage->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $landingPage->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection