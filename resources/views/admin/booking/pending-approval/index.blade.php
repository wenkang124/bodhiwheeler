@extends('admin.layouts.index')

@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Booking</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Pending Approval
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-auto mt-3 mt-md-0 align-self-center">
            <div class="d-flex">
                <a href="{{route('admin.booking.pending-approval.create')}}" class="btn btn-success">
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table stylish-table v-middle">
                                <thead>
                                    <tr>
                                        <th class="border-bottom"> Name</th>
                                        <th class="border-bottom">Contact</th>
                                        <th class="border-bottom">Package</th>
                                        <th class="border-bottom">Status</th>
                                        <th class="border-bottom">Detail</th>
                                        <th class="border-bottom">Created At</th>
                                        <th class="border-bottom">Action</th>
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
                url: "{{ route('admin.booking.pending-approval.query') }}",
                method: "POST",
            },
            serverSide: true,
            order: [
                [5, 'desc']
            ],
            bFilter: true,
            columns: [{
                    data: "name",
                },
                {
                    data: "phone",
                    className: "text-center"
                },
                {
                    data: "package_name",
                    className: "text-center"
                },
                {
                    data: "status",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "details",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "created_at",
                    className: "text-center"
                },
                {
                    data: "actions",
                    orderable: false,
                    searchable: false
                },
            ],
            pageLength: 25,
        });

        $('#btn-filter').click(function(e) {
            e.preventDefault();
            oTable.draw();
        })

        $('#btn-reload').click(function(e) {
            e.preventDefault();
            $('input[name="date_range"]').val(null)
            oTable.draw();
        })
    </script>
@endpush
