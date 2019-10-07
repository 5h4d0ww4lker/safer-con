
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($category)->name) }}" minlength="1" maxlength="50" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="pay_rate" class="col-md-2 control-label">Pay Rate</label>
    <div class="col-md-10">
        <select class="form-control" id="pay_rate" name="pay_rate" required="true">
        	    <option value="" style="display: none;" {{ old('pay_rate', optional($category)->pay_rate ?: '') == '' ? 'selected' : '' }} disabled selected>Select pay rate</option>
        	@foreach ($pay_rates as $key => $pay_rate)
			    <option value="{{ $key }}" {{ old('pay_rate', optional($pay_rate)->id) == $key ? 'selected' : '' }}>
			    	{{ $pay_rate }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('pay_rate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="pay_rate" class="col-md-2 control-label">Tax</label>
    <div class="col-md-10">
        <select class="form-control" id="tax" name="tax" required="true">
        	    <option value="" style="display: none;" {{ old('tax', optional($category)->tax ?: '') == '' ? 'selected' : '' }} disabled selected>Select Tax</option>
        	@foreach ($taxes as $key => $tax)
			    <option value="{{ $key }}" {{ old('tax', optional($tax)->id) == $key ? 'selected' : '' }}>
			    	{{ $tax }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('pay_rate', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('default_image') ? 'has-error' : '' }}">
    <label for="default_image" class="col-md-2 control-label">Default Image</label>
    <div class="col-md-6">
    <input type="file" name="default_image" id="default_image" class="form-control">
                               
                                @if ($errors->has('default_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('default_image') }}</strong>
                                </span>
                                @if($category)
                <img src="{{ url('/' . $brand->default_image) }}" class="img-responsive img-thumbnail" width="200px" height="200px">
                <img src="{{ url('/' . $category->default_image) }}"   width="200px" height="200px">
                @endif                              @endif
    </div>
</div>

