@extends('admin.layouts.index')

@push('breadcrumb')
    <div class="row">
        <div class="col-md-5 align-self-center">
            <h3 class="page-title">Edit System Config</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            System Config
                        </li>
                        <li class="breadcrumb-item">
                            Edit
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
                        <h4 class="card-title">Edit System Config</h4>
                    </div>
                    <div class="card-body">
                        {{ Form::model($systemConfig, ['route' => ['admin.system-config.update', $systemConfig->id], 'class' => 'form-horizontal', 'files' => true]) }}
                        <h4 class="card-title">System Config</h4>
                        <div class="mb-3 row {{ $errors->has('is_active') ? 'has-danger' : '' }}">
                            <label class="col-sm-3 text-end control-label col-form-label">Status</label>
                            <div class="col-sm-9">
                                {{ Form::hidden('is_active', 0) }} <!-- Hidden field for when the checkbox is unchecked -->
                                {{ Form::checkbox('is_active', 1, $systemConfig->is_active, ['data-toggle' => 'toggle', 'data-on' => 'Active', 'data-off' => 'Inactive', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'data-size' => 'sm', 'data-width' => '100']) }}
                                @error('is_active')
                                    <small class="form-control-feedback">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 text-end control-label col-form-label">Current Payment QR Code</label>
                            <div class="col-sm-9">
                                <img id="preview_image" src="{{ $systemConfig->image_path ? asset('/storage/' . $systemConfig->image_path) : asset('assets/images/payment-qr.jpg') }}" alt="Payment QR Code" class="mb-4" style="max-width: 200px;">
                                <input type="file" name="image_path" class="form-control" onchange="previewImage(event)">
                                @error('image_path')
                                    <small class="form-control-feedback">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 p-3 border-top text-center">
                            <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                Save
                            </button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
