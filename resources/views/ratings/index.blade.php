@extends('layouts.app')

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
                <h4 class="mt-5 mb-5">Ratings</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('ratings.rating.create') }}" class="btn btn-success" title="Create New Rating">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($ratings) == 0)
            <div class="panel-body text-center">
                <h4>No Ratings Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Item</th>
                            <th>Rate</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ratings as $rating)
                        <tr>
                            <td>{{ optional($rating->user)->id }}</td>
                            <td>{{ optional($rating->item)->name }}</td>
                            <td>{{ $rating->rate }}</td>

                            <td>

                                <form method="POST" action="{!! route('ratings.rating.destroy', $rating->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('ratings.rating.show', $rating->id ) }}" class="btn btn-info" title="Show Rating">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('ratings.rating.edit', $rating->id ) }}" class="btn btn-primary" title="Edit Rating">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Rating" onclick="return confirm(&quot;Click Ok to delete Rating.&quot;)">
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
            {!! $ratings->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection