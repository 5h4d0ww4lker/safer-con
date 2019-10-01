@if (!empty(Session::get('item_id')))

<input class="form-control" name="item_id" type="hidden" id="description" value="{{ Session::get('item_id') }}" maxlength="1000">
@else
<div class="form-group {{ $errors->has('item_id') ? 'has-error' : '' }}">
    <label for="item_id" class="col-md-2 control-label">Item </label>
    <div class="col-md-10">
        <select class="form-control" id="item_id" name="item_id" required="true">
            <option value="" style="display: none;" {{ old('item_id', optional($itemDetail)->item_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select item</option>
            @foreach ($items as $key => $item)
            <option value="{{ $key }}" {{ old('item_id', optional($itemDetail)->item_id) == $key ? 'selected' : '' }}>
                {{ $item }}
            </option>
            @endforeach
        </select>

        {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description  *</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($itemDetail)->description) }}" maxlength="1000">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
    <label for="stock" class="col-md-2 control-label">Stock *</label>
    <div class="col-md-10">
        <input class="form-control" name="stock" type="text" id="stock" value="{{ old('stock', optional($itemDetail)->stock) }}" maxlength="20" placeholder="Enter stock here...">
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
    <label for="size" class="col-md-2 control-label">Size *</label>
    <div class="col-md-10">
        <input class="form-control" name="size" type="text" id="size" value="{{ old('size', optional($itemDetail)->size) }}" maxlength="20" placeholder="Enter size here...">
        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
    <label for="color" class="col-md-2 control-label">Color *</label>
    <div class="col-md-10">
        <input class="form-control" name="color" type="text" id="color" value="{{ old('color', optional($itemDetail)->color) }}" maxlength="100" placeholder="Enter color here...">
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('additional_info') ? 'has-error' : '' }}">
    <label for="additional_info" class="col-md-2 control-label">Additional Info *</label>
    <div class="col-md-10">
        <input class="form-control" name="additional_info" type="text" id="additional_info" value="{{ old('additional_info', optional($itemDetail)->additional_info) }}" maxlength="1000" placeholder="Enter additional info here...">
        {!! $errors->first('additional_info', '<p class="help-block">:message</p>') !!}
    </div>
</div>