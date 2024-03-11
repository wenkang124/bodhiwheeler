<div class="mb-3 row {{ $errors->has('name') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Name</label>
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        @error('name')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('email') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Email</label>
    <div class="col-sm-9">
        @if (request()->routeIs('admin.driver.edit'))
            {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => true]) }}
        @else
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        @endif
        @error('email')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('phone') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Phone</label>
    <div class="col-sm-9">
        {{ Form::text('phone', null, ['class' => 'form-control']) }}
        @error('phone')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('status') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Status</label>
    <div class="col-sm-9">
        {{ Form::hidden('status', 'inactive') }}
        {{ Form::checkbox('status', 'active', true, ['data-toggle' => 'toggle', 'data-on' => 'Active', 'data-off' => 'Inactive', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'data-size' => 'sm', 'data-width' => '100']) }}
        <small class="text-muted">
            Only active status will be selectable
        </small>
        @error('status')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
