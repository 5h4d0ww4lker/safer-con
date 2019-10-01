<div class=" col-md-7 col-md-offset-2">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title" class="col-md-2 control-label">Title</label>
        <div class="col-md-10">
            <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($landingPage)->title) }}" minlength="1" maxlength="100" required="true" placeholder="Enter title here...">
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('heading') ? 'has-error' : '' }}">
        <label for="heading" class="col-md-2 control-label">Heading</label>
        <div class="col-md-10">
            <input class="form-control" name="heading" type="text" id="heading" value="{{ old('heading', optional($landingPage)->heading) }}" minlength="1" maxlength="1000" required="true" placeholder="Enter heading here...">
            {!! $errors->first('heading', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
        <label for="content" class="col-md-2 control-label">Content</label>
        <div class="col-md-10">
            <input class="form-control" name="content" type="text" id="content" value="{{ old('content', optional($landingPage)->content) }}" minlength="1" maxlength="10000" required="true" placeholder="Enter content here...">
            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
        <label for="file" class="col-md-2 control-label">File</label>
        <div class="col-md-10">
            <input class="form-control" name="file" type="file" id="file" value="{{ old('file', optional($landingPage)->file) }}" minlength="1" maxlength="10000" required="true">
            {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
            @if($landingPage)
        <img src="{{ url('/' . $landingPage->file) }}" class="img-responsive img-thumbnail" width="200px" height="200px">
        @endif
        </div>
     
    </div>

</div>