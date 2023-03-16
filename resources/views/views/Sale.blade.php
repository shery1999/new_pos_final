@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    {{-- <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav> --}}
    @if (session()->has('msg'))
        @if (session()->has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Transaction Successfull :</strong> To Print details click :
                <a href="{{ url(Session::get('msg')) }}">
                    <button type="button" class="btn btn-info">Print</button>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
        @endif
    @endif
    @if (session()->has('msgf'))
        @if (session()->has('msgf'))
            <div class="col-lg-12 alert alert-danger" role="alert">
                Data Not Inserted.
            </div>
        @endif
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Select Customer</h6>
                    <a href="/add_customer">
                        <button type="button" class="btn btn-primary">Add New </button>
                    </a>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>CNIC</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>CNIC Image</th>
                                    <th>Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Data as $index => $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['cnic'] }}</td>
                                        <td>{{ $item['phone_number'] }}</td>
                                        <td>{{ $item['address'] }}</td>
                                        <td>{{ $item['description'] }}</td>
                                        <td>
                                            @if ($item['cnic_image'])
                                                <img src="{{ url('/storage/' . $item['cnic_image']) }}" height="50px"
                                                    width="50px" alt="" title="" />
                                            @endif
                                        </td>
                                        <td><a href="/sale/{{ $item['id'] }}">
                                                <button type="button" class="btn btn-success">Select</button>
                                            </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
