<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Label</label>
    <div class="col-md-10">
        <input class="form-control" name="label" type="text" id="label" value="{{ old('label', optional($about)->label) }}" minlength="1" maxlength="100" required="true" placeholder="Enter label here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($about)->description) }}" minlength="1" maxlength="1000" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="file" id="image" value="{{ old('image', optional($about)->image) }}" >
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select name="status" class="form-control" required>
            <option value="Active"> Active <option>
            <option value="Inactive"> Inactive <option>
        </select>
    </div>
</div>