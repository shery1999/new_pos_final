@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"> Add Sale Items</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Wight</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Add to Lot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Data as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <td>{{ $item['weight'] }}</td>
                                        <td>{{ $item['description'] }}</td>
                                        <td>
                                            <div class="counter">
                                                <button class=" btn mb-1 btn-primary counter-btn decrement-btn">-</button>
                                                <span class="counter-value">1</span>
                                                <button class=" btn mb-1 btn-primary counter-btn increment-btn">+</button>
                                            </div>
                                        </td>
                                        <td> <button type="button" class="use-button  btn mb-1 btn-primary">Add to
                                                Cart<span class=" btn-icon-right"><i class="fa fa-shopping-cart"></i></span>
                                            </button>
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
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
@push('footer-script')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
@endpush
