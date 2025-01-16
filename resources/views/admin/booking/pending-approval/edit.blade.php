@extends('admin.layouts.index')

@push('breadcrumb')
<div class="row">
    <div class="col-md align-self-center">
        <h3 class="page-title">Edit Booking</h3>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.booking.pending-approval')}}">Pending Approval</a>
                    </li>
                    <li class="breadcrumb-item">
                        {{$booking->id}}
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
                    <h4 class="card-title">Edit</h4>
                </div>
                <div class="card-body">
                    {{Form::model($booking,['route'=>['admin.booking.pending-approval.update',$booking], 'class'=>'form-horizontal', 'files'=>true])}}
                    @include('admin.booking.pending-approval.form')
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