@extends('master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($testimonial->label) ? $testimonial->label : 'Testimonial' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('testimonials.testimonial.destroy', $testimonial->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('testimonials.testimonial.index') }}" class="btn btn-primary" title="Show All Testimonial">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('testimonials.testimonial.create') }}" class="btn btn-success" title="Create New Testimonial">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('testimonials.testimonial.edit', $testimonial->id ) }}" class="btn btn-primary" title="Edit Testimonial">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Testimonial" onclick="return confirm(&quot;Click Ok to delete Testimonial.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $testimonial->label }}</dd>
            <dt>Description</dt>
            <dd>{{ $testimonial->description }}</dd>
            <dt>Image</dt>
            <dd>{{ $testimonial->image }}</dd>
            <dt>Status</dt>
            <dd>{{ $testimonial->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($testimonial->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($testimonial->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($testimonial->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $testimonial->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $testimonial->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $testimonial->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection