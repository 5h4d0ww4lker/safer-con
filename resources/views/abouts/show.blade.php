@extends('master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($about->label) ? $about->label : 'About' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('abouts.about.destroy', $about->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('abouts.about.index') }}" class="btn btn-primary" title="Show All About">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('abouts.about.create') }}" class="btn btn-success" title="Create New About">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('abouts.about.edit', $about->id ) }}" class="btn btn-primary" title="Edit About">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete About" onclick="return confirm(&quot;Click Ok to delete About.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $about->label }}</dd>
            <dt>Description</dt>
            <dd>{{ $about->description }}</dd>
            <dt>Image</dt>
            <dd>{{ $about->image }}</dd>
            <dt>Status</dt>
            <dd>{{ $about->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($about->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($about->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($about->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $about->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $about->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $about->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection