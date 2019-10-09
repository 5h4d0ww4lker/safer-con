@extends('master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($contact->name) ? $contact->name : 'Contact' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('contacts.contact.destroy', $contact->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('contacts.contact.index') }}" class="btn btn-primary" title="Show All Contact">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('contacts.contact.create') }}" class="btn btn-success" title="Create New Contact">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('contacts.contact.edit', $contact->id ) }}" class="btn btn-primary" title="Edit Contact">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Contact" onclick="return confirm(&quot;Click Ok to delete Contact.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $contact->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $contact->email }}</dd>
            <dt>Website</dt>
            <dd>{{ $contact->website }}</dd>
            <dt>Content</dt>
            <dd>{{ $contact->content }}</dd>
            <dt>Created At</dt>
            <dd>{{ $contact->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection