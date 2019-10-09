
<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Label</label>
    <div class="col-md-10">
        <input class="form-control" name="label" type="number" id="label" value="{{ old('label', optional($homeSlider)->label) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter label here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('header') ? 'has-error' : '' }}">
    <label for="header" class="col-md-2 control-label">Header</label>
    <div class="col-md-10">
        <input class="form-control" name="header" type="text" id="header" value="{{ old('header', optional($homeSlider)->header) }}" minlength="1" maxlength="100" required="true" placeholder="Enter header here...">
        {!! $errors->first('header', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($homeSlider)->description) }}" minlength="1" maxlength="1000" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_path') ? 'has-error' : '' }}">
    <label for="file_path" class="col-md-2 control-label">File Path</label>
    <div class="col-md-10">
        <input class="form-control" name="file_path" type="text" id="file_path" value="{{ old('file_path', optional($homeSlider)->file_path) }}" minlength="1" maxlength="255" required="true" placeholder="Enter file path here...">
        {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($homeSlider)->status) }}" minlength="1" maxlength="10" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">Created By</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($homeSlider)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select created by</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($homeSlider)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_by') ? 'has-error' : '' }}">
    <label for="updated_by" class="col-md-2 control-label">Updated By</label>
    <div class="col-md-10">
        <select class="form-control" id="updated_by" name="updated_by">
        	    <option value="" style="display: none;" {{ old('updated_by', optional($homeSlider)->updated_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select updated by</option>
        	@foreach ($updaters as $key => $updater)
			    <option value="{{ $key }}" {{ old('updated_by', optional($homeSlider)->updated_by) == $key ? 'selected' : '' }}>
			    	{{ $updater }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deleted_by') ? 'has-error' : '' }}">
    <label for="deleted_by" class="col-md-2 control-label">Deleted By</label>
    <div class="col-md-10">
        <select class="form-control" id="deleted_by" name="deleted_by">
        	    <option value="" style="display: none;" {{ old('deleted_by', optional($homeSlider)->deleted_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select deleted by</option>
        	@foreach ($deletedBies as $key => $deletedBy)
			    <option value="{{ $key }}" {{ old('deleted_by', optional($homeSlider)->deleted_by) == $key ? 'selected' : '' }}>
			    	{{ $deletedBy }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('deleted_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

