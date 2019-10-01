
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" id="category_id" name="category_id" required="true">
        	    <option value="" style="display: none;" {{ old('category_id', optional($subCategory)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select category</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($subCategory)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($subCategory)->name) }}" minlength="1" maxlength="200" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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
                                @endif
                                @if($subCategory)
                      <img src="{{ url('/' . $subCategory->default_image) }}" class="img-responsive img-thumbnail"   width="200px" height="200px">
                @endif        
    </div>
</div>
