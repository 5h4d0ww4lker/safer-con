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
                <h4 class="mt-5 mb-5">Shopping Carts</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('shopping_carts.shopping_cart.create') }}" class="btn btn-success" title="Create New Shopping Cart">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($shoppingCarts) == 0)
            <div class="panel-body text-center">
                <h4>No Shopping Carts Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Merchant</th>
                            <th>User</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($shoppingCarts as $shoppingCart)
                        <tr>
                            <td>{{ optional($shoppingCart->merchant)->name }}</td>
                            <td>{{ optional($shoppingCart->user)->id }}</td>
                            <td>{{ optional($shoppingCart->item)->name }}</td>
                            <td>{{ $shoppingCart->price }}</td>
                            <td>{{ $shoppingCart->status }}</td>

                            <td>

                                <form method="POST" action="{!! route('shopping_carts.shopping_cart.destroy', $shoppingCart->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('shopping_carts.shopping_cart.show', $shoppingCart->id ) }}" class="btn btn-info" title="Show Shopping Cart">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('shopping_carts.shopping_cart.edit', $shoppingCart->id ) }}" class="btn btn-primary" title="Edit Shopping Cart">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Shopping Cart" onclick="return confirm(&quot;Click Ok to delete Shopping Cart.&quot;)">
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
            {!! $shoppingCarts->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection