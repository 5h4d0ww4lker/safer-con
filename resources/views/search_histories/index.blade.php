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
                <h4 class="mt-5 mb-5">Search Histories</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('search_histories.search_history.create') }}" class="btn btn-success" title="Create New Search History">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($searchHistories) == 0)
            <div class="panel-body text-center">
                <h4>No Search Histories Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Search String</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($searchHistories as $searchHistory)
                        <tr>
                            <td>{{ optional($searchHistory->user)->id }}</td>
                            <td>{{ $searchHistory->search_string }}</td>

                            <td>

                                <form method="POST" action="{!! route('search_histories.search_history.destroy', $searchHistory->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('search_histories.search_history.show', $searchHistory->id ) }}" class="btn btn-info" title="Show Search History">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('search_histories.search_history.edit', $searchHistory->id ) }}" class="btn btn-primary" title="Edit Search History">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Search History" onclick="return confirm(&quot;Click Ok to delete Search History.&quot;)">
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
            {!! $searchHistories->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection