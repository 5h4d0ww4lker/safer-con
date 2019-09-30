
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($brand)->name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($brand)->description) }}" minlength="1" maxlength="1000" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('default_image') ? 'has-error' : '' }}">
    <label for="default_image" class="col-md-2 control-label">Default Image</label>
    <div class="col-md-6">
    <input type="file" name="default_image" id="default_image" class="form-control">
                               
                                @if ($errors->has('default_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('default_image') }}</strong>
                                </span>
                                @endif
    </div>
</div>
