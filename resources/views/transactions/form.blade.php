
<div class="form-group {{ $errors->has('from') ? 'has-error' : '' }}">
    <label for="from" class="col-md-2 control-label">From</label>
    <div class="col-md-10">
        <input class="form-control" name="from" type="number" id="from" value="{{ old('from', optional($transaction)->from) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter from here...">
        {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('to') ? 'has-error' : '' }}">
    <label for="to" class="col-md-2 control-label">To</label>
    <div class="col-md-10">
        <input class="form-control" name="to" type="number" id="to" value="{{ old('to', optional($transaction)->to) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter to here...">
        {!! $errors->first('to', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="text" id="amount" value="{{ old('amount', optional($transaction)->amount) }}" minlength="1" maxlength="20" required="true" placeholder="Enter amount here...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($transaction)->status) }}" minlength="1" maxlength="25" required="true" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">Created By</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($transaction)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select created by</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($transaction)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_by') ? 'has-error' : '' }}">
    <label for="updated_by" class="col-md-2 control-label">Updated By</label>
    <div class="col-md-10">
        <select class="form-control" id="updated_by" name="updated_by">
        	    <option value="" style="display: none;" {{ old('updated_by', optional($transaction)->updated_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select updated by</option>
        	@foreach ($updaters as $key => $updater)
			    <option value="{{ $key }}" {{ old('updated_by', optional($transaction)->updated_by) == $key ? 'selected' : '' }}>
			    	{{ $updater }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

