<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Partner Name</label>
    <div class="col-md-10">
        <input class="form-control" name="label" type="text" id="label" value="{{ old('label', optional($partner)->label) }}" minlength="1" maxlength="100" required="true" placeholder="Enter partner name here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    

    @if($partner)
 
        <div class="col-md-4">
            <img src="{{ url('/' . $partner->image) }}" class="img-responsive img-thumbnail" width="200px" height="200px">
            <input class="form-control" name="image" type="file" id="image" value="{{ old('image', optional($partner)->image) }}">
     
        </div>
@else
<div class="col-md-4">
 <input class="form-control file-input" name="image" type="file" id="image" value="{{ old('image', optional($partner)->image) }}" required="true">

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

