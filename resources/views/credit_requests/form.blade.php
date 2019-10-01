
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($creditRequest)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
            @foreach ($users as $key => $user)
            <?php
$user_info = \App\User::find($key);


?>
			    <option value="{{ $key }}" {{ old('user_id', optional($creditRequest)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user_info->name}}&nbsp;{{ $user_info->father_name}}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="text" id="amount" value="{{ old('amount', optional($creditRequest)->amount) }}" minlength="1" maxlength="20" required="true" placeholder="Enter amount here...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_id') ? 'has-error' : '' }}">
    <label for="bank_id" class="col-md-2 control-label">Bank</label>
    <div class="col-md-10">
        <select class="form-control" id="bank_id" name="bank_id" required="true">
        	    <option value="" style="display: none;" {{ old('bank_id', optional($creditRequest)->bank_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select bank</option>
            @foreach ($banks as $key => $bank)
            <?php
$bank_info = \App\Models\Bank::find($key);


?>
			    <option value="{{ $key }}" {{ old('bank_id', optional($creditRequest)->bank_id) == $key ? 'selected' : '' }}>
			    	{{ $bank_info->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('bank_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('transaction_id') ? 'has-error' : '' }}">
    <label for="transaction_id" class="col-md-2 control-label">Transaction ID</label>
    <div class="col-md-10">
    <input class="form-control" name="transaction_id" type="text" id="transaction_id" value="{{ old('transaction_id', optional($creditRequest)->transaction_id) }}" maxlength="20">

        
        {!! $errors->first('transaction_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
    <select class="form-control" id="transaction_id" name="status" required="true">
        	    <option value="{{!! old('status', optional($creditRequest)->status) !!}}">{!!($creditRequest)->status!!}</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Declined">Declined</option>

        
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>



