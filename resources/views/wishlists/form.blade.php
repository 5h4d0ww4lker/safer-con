
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($wishlist)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($wishlist)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
    <label for="item_id" class="col-md-2 control-label">Item</label>
    <div class="col-md-10">
        <select class="form-control" id="item_id" name="item_id" required="true">
        	    <option value="" style="display: none;" {{ old('item_id', optional($wishlist)->item_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select item</option>
        	@foreach ($items as $key => $item)
			    <option value="{{ $key }}" {{ old('item_id', optional($wishlist)->item_id) == $key ? 'selected' : '' }}>
			    	{{ $item }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

