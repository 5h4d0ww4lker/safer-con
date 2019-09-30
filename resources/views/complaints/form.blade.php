
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($complaint)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($complaint)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('merchant_id') ? 'has-error' : '' }}">
    <label for="merchant_id" class="col-md-2 control-label">Merchant</label>
    <div class="col-md-10">
        <select class="form-control" id="merchant_id" name="merchant_id" required="true">
        	    <option value="" style="display: none;" {{ old('merchant_id', optional($complaint)->merchant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select merchant</option>
        	@foreach ($merchants as $key => $merchant)
			    <option value="{{ $key }}" {{ old('merchant_id', optional($complaint)->merchant_id) == $key ? 'selected' : '' }}>
			    	{{ $merchant }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('merchant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">Title</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($complaint)->title) }}" minlength="1" maxlength="100" required="true" placeholder="Enter title here...">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($complaint)->description) }}" minlength="1" maxlength="1000" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($complaint)->status) }}" minlength="1" maxlength="20" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_by') ? 'has-error' : '' }}">
    <label for="updated_by" class="col-md-2 control-label">Updated By</label>
    <div class="col-md-10">
        <select class="form-control" id="updated_by" name="updated_by">
        	    <option value="" style="display: none;" {{ old('updated_by', optional($complaint)->updated_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select updated by</option>
        	@foreach ($updaters as $key => $updater)
			    <option value="{{ $key }}" {{ old('updated_by', optional($complaint)->updated_by) == $key ? 'selected' : '' }}>
			    	{{ $updater }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

