
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($merchant)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($merchant)->address) }}" minlength="1" maxlength="100" required="true" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('profile_picture') ? 'has-error' : '' }}">
    <label for="profile_picture" class="col-md-2 control-label">Profile Picture</label>
    <div class="col-md-10">
        <input class="form-control" name="profile_picture" type="number" id="profile_picture" value="{{ old('profile_picture', optional($merchant)->profile_picture) }}" min="-2147483648" max="2147483647" placeholder="Enter profile picture here...">
        {!! $errors->first('profile_picture', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tin') ? 'has-error' : '' }}">
    <label for="tin" class="col-md-2 control-label">Tin</label>
    <div class="col-md-10">
        <input class="form-control" name="tin" type="text" id="tin" value="{{ old('tin', optional($merchant)->tin) }}" maxlength="50" placeholder="Enter tin here...">
        {!! $errors->first('tin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
    <label for="role" class="col-md-2 control-label">User Id</label>
    <div class="col-md-10">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ old('user_id', optional($merchant)->user_id) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter role here...">
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('activation_status') ? 'has-error' : '' }}">
    <label for="activation_status" class="col-md-2 control-label">Activation Status</label>
    <div class="col-md-10">
        <input class="form-control" name="activation_status" type="text" id="activation_status" value="{{ old('activation_status', optional($merchant)->activation_status) }}" minlength="1" maxlength="10" required="true" placeholder="Enter activation status here...">
        {!! $errors->first('activation_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deletion_status') ? 'has-error' : '' }}">
    <label for="deletion_status" class="col-md-2 control-label">Deletion Status</label>
    <div class="col-md-10">
        <input class="form-control" name="deletion_status" type="text" id="deletion_status" value="{{ old('deletion_status', optional($merchant)->deletion_status) }}" maxlength="10" placeholder="Enter deletion status here...">
        {!! $errors->first('deletion_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

