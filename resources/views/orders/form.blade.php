

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Delivery Date</label>
    <div class="col-md-10">
    <input type="text" name="delivery_date" class="form-control" value="{{ old('delivery_date', optional($order)->delivery_date) }}" id="datepicker" required>

    </div>
</div>

<!-- /.form-group -->