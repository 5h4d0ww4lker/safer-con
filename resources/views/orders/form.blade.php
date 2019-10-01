<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Delivery Date</label>
    <div class="col-md-10">
        <input type="text" name="delivery_date" class="form-control" value="{{ old('delivery_date', optional($order)->delivery_date) }}" id="datepicker" required>

    </div>
</div>

<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
    <label for="brand_id" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select class="form-control" id="brand_id" name="status" required="true">

            @if($order)
            @if($item->order == 'Pending')
            <option value="Pending">Pending</option>
            @endif
            @if($item->status == 'Canceled')
            <option value="Canceled">Canceled</option>
            @endif
            @endif
            <option value="Pending">Pending</option>
            <option value="Canceled">Canceled</option>
        </select>

        {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- /.form-group -->