@extends('master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Home Sliders</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('home_sliders.home_slider.create') }}" class="btn btn-success" title="Create New Home Slider">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($homeSliders) == 0)
            <div class="panel-body text-center">
                <h4>No Home Sliders Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Header</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($homeSliders as $homeSlider)
                        <tr>
                            <td>{{ $homeSlider->label }}</td>
                            <td>{{ $homeSlider->header }}</td>

                            <td>

                                <form method="POST" action="{!! route('home_sliders.home_slider.destroy', $homeSlider->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('home_sliders.home_slider.show', $homeSlider->id ) }}" class="btn btn-info" title="Show Home Slider">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('home_sliders.home_slider.edit', $homeSlider->id ) }}" class="btn btn-primary" title="Edit Home Slider">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Home Slider" onclick="return confirm(&quot;Click Ok to delete Home Slider.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $homeSliders->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection