@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($gallery->label) ? $gallery->label : 'Gallery' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('galleries.gallery.destroy', $gallery->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('galleries.gallery.index') }}" class="btn btn-primary" title="Show All Gallery">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('galleries.gallery.create') }}" class="btn btn-success" title="Create New Gallery">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('galleries.gallery.edit', $gallery->id ) }}" class="btn btn-primary" title="Edit Gallery">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Gallery" onclick="return confirm(&quot;Click Ok to delete Gallery.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $gallery->label }}</dd>
            <dt>Description</dt>
            <dd>{{ $gallery->description }}</dd>
            <dt>Image</dt>
            <dd>{{ $gallery->image }}</dd>
            <dt>Status</dt>
            <dd>{{ $gallery->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($gallery->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($gallery->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($gallery->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $gallery->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $gallery->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $gallery->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection