
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-3 control-label">Name</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($tax)->name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
    <label for="rate" class="col-md-3 control-label">Percentage</label>
    <div class="col-md-6">
        <input class="form-control" name="rate" type="number" id="rate" value="{{ old('rate', optional($tax)->rate) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter percentage from merchant here...">
        {!! $errors->first('rate', '<p class="help-block">:message</p>') !!}
    </div>
</div>






