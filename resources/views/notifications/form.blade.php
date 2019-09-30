
<div class="form-group {{ $errors->has('notify_to') ? 'has-error' : '' }}">
    <label for="notify_to" class="col-md-2 control-label">Notify To</label>
    <div class="col-md-10">
        <input class="form-control" name="notify_to" type="number" id="notify_to" value="{{ old('notify_to', optional($notification)->notify_to) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter notify to here...">
        {!! $errors->first('notify_to', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="content" class="col-md-2 control-label">Content</label>
    <div class="col-md-10">
        <input class="form-control" name="content" type="text" id="content" value="{{ old('content', optional($notification)->content) }}" minlength="1" maxlength="1000" required="true" placeholder="Enter content here...">
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($notification)->status) }}" minlength="1" maxlength="10" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

