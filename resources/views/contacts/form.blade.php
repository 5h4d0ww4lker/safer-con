
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($contact)->name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($contact)->email) }}" minlength="1" maxlength="100" required="true" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
    <label for="website" class="col-md-2 control-label">Website</label>
    <div class="col-md-10">
        <input class="form-control" name="website" type="text" id="website" value="{{ old('website', optional($contact)->website) }}" maxlength="100" placeholder="Enter website here...">
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="content" class="col-md-2 control-label">Content</label>
    <div class="col-md-10">
        <input class="form-control" name="content" type="text" id="content" value="{{ old('content', optional($contact)->content) }}" minlength="1" maxlength="10000" required="true" placeholder="Enter content here...">
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>

