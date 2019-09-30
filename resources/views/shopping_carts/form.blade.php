
<div class="form-group {{ $errors->has('merchant_id') ? 'has-error' : '' }}">
    <label for="merchant_id" class="col-md-2 control-label">Merchant</label>
    <div class="col-md-10">
        <select class="form-control" id="merchant_id" name="merchant_id" required="true">
        	    <option value="" style="display: none;" {{ old('merchant_id', optional($shoppingCart)->merchant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select merchant</option>
        	@foreach ($merchants as $key => $merchant)
			    <option value="{{ $key }}" {{ old('merchant_id', optional($shoppingCart)->merchant_id) == $key ? 'selected' : '' }}>
			    	{{ $merchant }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('merchant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($shoppingCart)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($shoppingCart)->user_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('item_id', optional($shoppingCart)->item_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select item</option>
        	@foreach ($items as $key => $item)
			    <option value="{{ $key }}" {{ old('item_id', optional($shoppingCart)->item_id) == $key ? 'selected' : '' }}>
			    	{{ $item }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($shoppingCart)->price) }}" minlength="1" maxlength="10" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($shoppingCart)->status) }}" minlength="1" maxlength="10" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

