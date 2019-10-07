
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">From</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="from" required="true">
        	    <option value="" style="display: none;" {{ old('user_id', optional($creditTransfer)->from ?: '') == '' ? 'selected' : '' }} disabled selected>Select From</option>
            @foreach ($users as  $user)
         
			    <option value="{{ $user->id }}" {{ old('from', optional($creditTransfer)->from) == $user->id ? 'selected' : '' }}>
			    	{{ $user->name}}&nbsp;{{ $user->father_name}}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">From</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="to" required="true">
        	    <option value="" style="display: none;" {{ old('to', optional($creditTransfer)->to ?: '') == '' ? 'selected' : '' }} disabled selected>Select To</option>
            @foreach ($users as  $user)
        
			    <option value="{{ $user->id }}" {{ old('to', optional($creditTransfer)->to) == $user->id ? 'selected' : '' }}>
			    	{{ $user->name}}&nbsp;{{ $user->father_name}}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="text" id="amount" value="{{ old('amount', optional($creditTransfer)->amount) }}" minlength="1" maxlength="20" required="true" placeholder="Enter amount here...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>








 