<h4 class="card-title">Basic Information</h4>
<div class="mb-3 row {{$errors->has('name')?'has-danger':''}}">
    <label class="col-sm-3 text-end control-label col-form-label">Name</label>
    <div class="col-sm-9">
        {{Form::text('name', null, ['class'=>'form-control'])}}
        @error('name')
        <small class="form-control-feedback">
            {{$message}}
        </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{$errors->has('email')?'has-danger':''}}">
    <label class="col-sm-3 text-end control-label col-form-label">Email</label>
    <div class="col-sm-9">
        {{Form::email('email', null, ['class'=>'form-control'])}}
        @error('email')
        <small class="form-control-feedback">
            {{$message}}
        </small>
        @enderror
    </div>
</div>
