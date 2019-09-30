
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($bank)->name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('account_no') ? 'has-error' : '' }}">
    <label for="account_no" class="col-md-2 control-label">Account No</label>
    <div class="col-md-10">
        <input class="form-control" name="account_no" type="text" id="account_no" value="{{ old('account_no', optional($bank)->account_no) }}" min="1" max="20" required="true" placeholder="Enter account no here...">
        {!! $errors->first('account_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>
