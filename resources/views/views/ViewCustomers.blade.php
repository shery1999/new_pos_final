@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav> --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Customers Table</h6>
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
                                    <th>History</th>
                                    <th>Update User</th>
                                    <th>Block/Unblock</th>
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
                                        <td><a href="/customers_history/{{ $item['id'] }}">
                                                <button type="button" class="btn btn-success">View History</button>
                                            </a></td>
                                        <td><a href="/update_customer/{{ $item['id'] }}">
                                                <button type="button" class="btn btn-warning">Update</button>
                                            </a></td>
                                        <td>
                                            <button value="{{ $item['id'] }}" type="button"
                                                class="use-button btn btn-block userStatusUpdate {{ $item['status'] == 1 ? 'btn-success' : 'btn-danger' }}">{{ $item['status'] == 1 ? 'Active' : 'Block' }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.userStatusUpdate').click(function() {
                var user_id = $(this).attr("value");
                var isActive = false;
                var statusVal = 1;
                if ($(this).attr("class").search("btn-success") > 0) {
                    var isActive = true;
                    var statusVal = 0;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('view_Customers.post') }}",
                    // headers: {
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        id: user_id,
                        status: statusVal
                    },

                    success: function(result) {
                        if (result.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'User Status Not Updated',
                                text: result.error,
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Workshop Status Updated',
                                text: result.success,
                            })
                            location.reload();
                        }
                    },
                    error: function(result) {
                        location.reload();
                        alert('Error');
                    }
                });
            });
        });
    </script>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush
