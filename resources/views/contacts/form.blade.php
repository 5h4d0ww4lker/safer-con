<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="label" value="{{ old('label', optional($contact)->email) }}" minlength="1" maxlength="100" required="true" placeholder="Enter member name here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="label" value="{{ old('label', optional($contact)->phone) }}" minlength="1" maxlength="100" required="true" placeholder="Enter member name here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">Fax</label>
    <div class="col-md-10">
        <input class="form-control" name="fax" type="text" id="label" value="{{ old('label', optional($contact)->fax) }}" minlength="1" maxlength="100" required="true" placeholder="Enter member name here...">
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Location</label>
    <div class="col-md-10">
    <textarea name="description" rows="5" id="description" class="form-control textarea" placeholder="Enter description.." required="true">{{ old('description', optional($contact)->description) }}</textarea>
             {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
