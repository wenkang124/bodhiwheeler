@extends('admin.layouts.index')

@push('breadcrumb')
<div class="row">
    <div class="col-md-5 align-self-center">
        <h3 class="page-title">Edit Password</h3>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        My Profile
                    </li>
                    <li class="breadcrumb-item">
                        Edit Password
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endpush

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding">
                    <h4 class="card-title">Edit Password</h4>
                </div>
                <div class="card-body">
                    {{Form::model(Auth::user(), ['route'=>'admin.me.update-password', 'class'=>'form-horizontal', 'files'=>true])}}
                    <h4 class="card-title">Security</h4>
                    <div class="mb-3 row {{$errors->has('password')?'has-danger':''}}">
                        <label class="col-sm-3 text-end control-label col-form-label">Current Password</label>
                        <div class="col-sm-9">
                            {{Form::password('password', ['class'=>'form-control'])}}
                            @error('password')
                            <small class="form-control-feedback">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row {{$errors->has('new_password')?'has-danger':''}}">
                        <label class="col-sm-3 text-end control-label col-form-label">New Password</label>
                        <div class="col-sm-9">
                            {{Form::password('new_password', ['class'=>'form-control'])}}
                            @error('new_password')
                            <small class="form-control-feedback">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row {{$errors->has('new_password_confirmation')?'has-danger':''}}">
                        <label class="col-sm-3 text-end control-label col-form-label">New Password Confirmation</label>
                        <div class="col-sm-9">
                            {{Form::password('new_password_confirmation', ['class'=>'form-control'])}}
                            @error('new_password_confirmation')
                            <small class="form-control-feedback">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 p-3 border-top text-center">
                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                            Save
                        </button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection