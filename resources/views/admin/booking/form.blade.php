<div class="mb-3 row {{ $errors->has('email') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Email</label>
    <div class="col-sm-9">
        {{ Form::email('email', $booking->email, ['class' => 'form-control', 'placeholder' => 'Customer Email (optional)']) }}
        @error('email')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('driver_id') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Driver</label>
    <div class="col-sm-9">
        {{ Form::select('driver_id', $availableDrivers->pluck('name', 'id'), $booking->driver_id, ['class' => 'form-control', 'placeholder' => 'Select a driver']) }}
        @error('driver_id')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
