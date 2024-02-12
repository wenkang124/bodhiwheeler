@extends('admin.layouts.index')

@push('breadcrumb')
<div class="row">
    <div class="col-md align-self-center">
        <h3 class="page-title">Edit Admin</h3>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.admin')}}">Admins</a>
                    </li>
                    <li class="breadcrumb-item">
                        {{$admin->name}}
                    </li>
                    <li class="breadcrumb-item">
                        Edit
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-auto mt-3 mt-md-0 align-self-center">
        <div class="d-flex">
            {{-- <a href="{{route('admin.admin.send-new-password',$admin)}}" class="btn btn-info me-1">
                <span class="mdi mdi-email-lock-outline"></span>
                Send New Password
            </a> --}}
            {{Form::open(['route'=>['admin.admin.delete',$admin] ])}}
            {{Form::hidden('_method','delete')}}
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you confirm to delete?')">
                <span class="mdi mdi-delete-empty"></span>
                Delete
            </button>
            {{Form::close()}}
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
                    <h4 class="card-title">Edit Admin</h4>
                </div>
                <div class="card-body">
                    {{Form::model($admin,['route'=>['admin.admin.update',$admin], 'class'=>'form-horizontal', 'files'=>true])}}
                    @include('admin.admin.form')
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