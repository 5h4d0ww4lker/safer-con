
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-3 control-label">Name</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($payRate)->name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percentage_from_merchant') ? 'has-error' : '' }}">
    <label for="percentage_from_merchant" class="col-md-3 control-label">% From Merchant</label>
    <div class="col-md-6">
        <input class="form-control" name="percentage_from_merchant" type="number" id="percentage_from_merchant" value="{{ old('percentage_from_merchant', optional($payRate)->percentage_from_merchant) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter percentage from merchant here...">
        {!! $errors->first('percentage_from_merchant', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('percentage_from_customer') ? 'has-error' : '' }}">
    <label for="percentage_from_customer" class="col-md-3 control-label">% From Customer</label>
    <div class="col-md-6">
        <input class="form-control" name="percentage_from_customer" type="number" id="percentage_from_customer" value="{{ old('percentage_from_customer', optional($payRate)->percentage_from_customer) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter percentage from customer here...">
        {!! $errors->first('percentage_from_customer', '<p class="help-block">:message</p>') !!}
    </div>
</div>







