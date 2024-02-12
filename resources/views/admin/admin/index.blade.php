@extends('admin.layouts.index')

@push('breadcrumb')
<div class="row">
    <div class="col-md align-self-center">
        <h3 class="page-title">Admins</h3>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Admins
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-auto mt-3 mt-md-0 align-self-center">
        <div class="d-flex">
            <a href="{{route('admin.admin.create')}}" class="btn btn-success">
                <i data-feather="plus" class="fill-white feather-sm"></i>
                Create
            </a>
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
                    <h4 class="card-title">Admins</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    var oTable = $('#dataTable').DataTable({
        ajax: {
            url: "{{ route('admin.admin.query') }}",
            method: "POST"
        },
        serverSide: true,
        order: [
            [0, 'desc']
        ],
        bFilter: true,
        columns: [
            {
                data: "name",
                orderable: false
            },
            {
                data: "email",
                orderable: false
            },
            {
                data: "created_at",
                searchable: false
            },
            {
                data: "actions",
                orderable: false,
                searchable: false
            }
        ]
    });

</script>
@endpush
