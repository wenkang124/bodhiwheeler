@extends('admin.layouts.index')

@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Driver</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Driver
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-auto mt-3 mt-md-0 align-self-center">
            <div class="d-flex gap-1">
                <a href="{{ route('admin.driver.create') }}" class="btn btn-success">
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
                                        <th class="border-bottom">
                                            Name
                                        </th>
                                        <th class="border-bottom">Email</th>
                                        <th class="border-bottom">Contact</th>
                                        <th class="border-bottom">Status</th>
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
                url: "{{ route('admin.driver.query') }}",
                method: "POST",
            },
            serverSide: true,
            order: [
                [0, 'asc']
            ],
            bFilter: true,
            columns: [{
                    data: "name",
                },
                {
                    data: "email",
                    className: "text-center"
                },
                {
                    data: "phone",
                    className: "text-center"
                },
                {
                    data: "status",
                    searchable: false,
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
