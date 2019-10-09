@extends('master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($homeSlider->label) ? $homeSlider->label : 'Home Slider' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('home_sliders.home_slider.destroy', $homeSlider->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('home_sliders.home_slider.index') }}" class="btn btn-primary" title="Show All Home Slider">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('home_sliders.home_slider.create') }}" class="btn btn-success" title="Create New Home Slider">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('home_sliders.home_slider.edit', $homeSlider->id ) }}" class="btn btn-primary" title="Edit Home Slider">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Home Slider" onclick="return confirm(&quot;Click Ok to delete Home Slider.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ $homeSlider->label }}</dd>
            <dt>Header</dt>
            <dd>{{ $homeSlider->header }}</dd>
            <dt>Description</dt>
            <dd>{{ $homeSlider->description }}</dd>
            <dt>File Path</dt>
            <dd>{{ $homeSlider->file_path }}</dd>
            <dt>Status</dt>
            <dd>{{ $homeSlider->status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($homeSlider->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($homeSlider->updater)->name }}</dd>
            <dt>Deleted By</dt>
            <dd>{{ optional($homeSlider->deletedBy)->id }}</dd>
            <dt>Created At</dt>
            <dd>{{ $homeSlider->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $homeSlider->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $homeSlider->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection