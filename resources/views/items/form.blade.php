<div class=" col-md-7">

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($item)->name) }}" minlength="1" maxlength="200" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('item_price') ? 'has-error' : '' }}">
    <label for="item_price" class="col-md-2 control-label">Item Price</label>
    <div class="col-md-10">
        <input class="form-control" name="item_price" type="text" id="item_price" value="{{ old('item_price', optional($item)->item_price) }}" maxlength="20" placeholder="Enter item price here...">
        {!! $errors->first('item_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" id="category_id" name="category_id" required="true">
        	    <option value="" style="display: none;" {{ old('category_id', optional($item)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select category</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($item)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
    <label for="sub_category_id" class="col-md-2 control-label">Sub Category</label>
    <div class="col-md-10">
        <select class="form-control" id="sub_category_id" name="sub_category_id" required="true">
        	    <option value="" style="display: none;" {{ old('category_id', optional($item)->sub_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sub category</option>
        	@foreach ($sub_categories as $key => $sub_category)
			    <option value="{{ $key }}" {{ old('sub_category_id', optional($item)->sub_category_id) == $key ? 'selected' : '' }}>
			    	{{ $sub_category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
    <label for="brand_id" class="col-md-2 control-label">Brand</label>
    <div class="col-md-10">
        <select class="form-control" id="brand_id" name="brand_id" required="true">
        	    <option value="" style="display: none;" {{ old('category_id', optional($item)->brand_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select brand</option>
        	@foreach ($brands as $key => $brand)
			    <option value="{{ $key }}" {{ old('brand_id', optional($item)->brand_id) == $key ? 'selected' : '' }}>
			    	{{ $brand }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
<div class=" col-md-5">
<div class="form-group {{ $errors->has('file_1') ? 'has-error' : '' }}">
    <label for="file_1" class="col-md-2 control-label">Image 1</label>
    <div class="col-md-10">
        <input class="form-control" name="file_1" type="file" id="file_1" value="{{ old('file_1', optional($item)->file_1) }}" min="-2147483648" max="2147483647" placeholder="Enter file 1 here...">
        {!! $errors->first('file_1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_2') ? 'has-error' : '' }}">
    <label for="file_2" class="col-md-2 control-label">Image 2</label>
    <div class="col-md-10">
        <input class="form-control" name="file_2" type="file" id="file_2" value="{{ old('file_2', optional($item)->file_2) }}" min="-2147483648" max="2147483647" placeholder="Enter file 2 here...">
        {!! $errors->first('file_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_3') ? 'has-error' : '' }}">
    <label for="file_3" class="col-md-2 control-label">Image 3</label>
    <div class="col-md-10">
        <input class="form-control" name="file_3" type="file" id="file_3" value="{{ old('file_3', optional($item)->file_3) }}" min="-2147483648" max="2147483647" placeholder="Enter file 3 here...">
        {!! $errors->first('file_3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_4') ? 'has-error' : '' }}">
    <label for="file_4" class="col-md-2 control-label">Image 4</label>
    <div class="col-md-10">
        <input class="form-control" name="file_4" type="file" id="file_4" value="{{ old('file_4', optional($item)->file_4) }}" min="-2147483648" max="2147483647" placeholder="Enter file 4 here...">
        {!! $errors->first('file_4', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_5') ? 'has-error' : '' }}">
    <label for="file_5" class="col-md-2 control-label">Image 5</label>
    <div class="col-md-10">
        <input class="form-control" name="file_5" type="file" id="file_5" value="{{ old('file_5', optional($item)->file_5) }}" min="-2147483648" max="2147483647" placeholder="Enter file 5 here...">
        {!! $errors->first('file_5', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_6') ? 'has-error' : '' }}">
    <label for="file_6" class="col-md-2 control-label">Image 6</label>
    <div class="col-md-10">
        <input class="form-control" name="file_6" type="file" id="file_6" value="{{ old('file_6', optional($item)->file_6) }}" min="-2147483648" max="2147483647" placeholder="Enter file 6 here...">
        {!! $errors->first('file_6', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>



