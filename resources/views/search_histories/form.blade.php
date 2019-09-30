
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($searchHistory)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($searchHistory)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('search_string') ? 'has-error' : '' }}">
    <label for="search_string" class="col-md-2 control-label">Search String</label>
    <div class="col-md-10">
        <input class="form-control" name="search_string" type="number" id="search_string" value="{{ old('search_string', optional($searchHistory)->search_string) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter search string here...">
        {!! $errors->first('search_string', '<p class="help-block">:message</p>') !!}
    </div>
</div>

