<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">From</label>
    <div class="col-md-10">
        <input class="form-control" name="label" type="text" id="label" value="{{ old('label', optional($testimonial)->label) }}" minlength="1" maxlength="100" required="true" placeholder="Enter from...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Designation</label>
    <div class="col-md-10">
        <input class="form-control" name="designation" type="text" id="label" value="{{ old('label', optional($testimonial)->designation) }}" minlength="1" maxlength="100" required="true" placeholder="Enter designation...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    

    @if($testimonial)
 
        <div class="col-md-4">
            <img src="{{ url('/' . $testimonial->image) }}" class="img-responsive img-thumbnail" width="200px" height="200px">
            <input class="form-control" name="image" type="file" id="image" value="{{ old('image', optional($testimonial)->image) }}">
     
        </div>
@else
<div class="col-md-4">
 <input class="form-control file-input" name="image" type="file" id="image" value="{{ old('image', optional($testimonial)->image) }}" required="true">

</div>

    @endif
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-3">
        <select name="status" class="form-control" required="true">
            <option value="Active"> Active
            <option>
            <option value="Inactive"> Inactive
            <option>
        </select>
    </div>
</div>



<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
    <textarea name="description" rows="5" id="description" class="form-control textarea" placeholder="Enter description.." required="true">{{ old('description', optional($testimonial)->description) }}</textarea>
             {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
