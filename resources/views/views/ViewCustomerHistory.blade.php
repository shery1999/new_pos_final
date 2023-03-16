@extends('layout.master')


@section('content')
    <style>
        .main-wrapper .page-wrapper .page-content {
            flex-grow: 1;
            padding: 25px;
            margin-top: 0;
        }

        .main-wrapper .page-wrapper .page-content {
            flex-grow: 1;
            padding: 25px;
            margin-top: 0;
        }

        hr {
            height: 0.4rem !important;
        }

        @media print {
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            body {
                padding-top: 5rem;
                padding-bottom: 5rem;
            }

            .table-responsive {
                page-break-inside: auto;
            }

            .no_print_break {
                page-break-inside: avoid;
            }

            .btn-print {
                display: none;
            }

        }
    </style>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        @foreach ($customer_data as $key => $customer)
                            <div class="col-lg-3 ps-0">
                                <a class="noble-ui-logo d-block mt-3">{{ $customer->name }}</a>
                                <p class="mt-1 mb-1"><b>CNIC:</b>{{ $customer->cnic }}</p>
                                <p><b>Phone:</b>{{ $customer->phone_number }}<br>
                                    <b>Address:</b> {{ $customer->address }}<br>
                                    <b>Description:</b> {{ $customer->description }}
                                </p>
                            </div>
                        @endforeach
                        <div class="col-lg-3 pe-0">
                            <div class="container-fluid w-100">
                                <a href="javascript:;" class="btn-print btn btn-outline-primary float-end mt-4"
                                    onclick="window.print()"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
                            </div>
                        </div>
                    </div>

                    {{-- //component section print --}}
                    @foreach ($data as $key => $items)
                        <div class="no_print_break">
                            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                <div class="table-responsive w-100">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Description</th>
                                                <th class="text-end">Quantity</th>
                                                <th class="text-end">Unit cost</th>
                                                <th class="text-end">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items->Order->OrderLines as $key => $item)
                                                <tr class="text-end">
                                                    <td class="text-start">{{ $key + 1 }}</td>
                                                    <td class="text-start">{{ $item->Items->name }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->Items->weight }}</td>
                                                    <td>{{ $item->Items->price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="container-fluid mt-5 w-100">
                                <div class="row">
                                    <div class="col-md-6 ms-auto">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end">{{ $items->subtotal_price }}-Rs</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount</td>
                                                        <td class="text-end">{{ $items->discount }}%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold-800">Date</td>
                                                        <td class="text-bold-800 text-end">
                                                            {{ date('jS M Y', strtotime($items->created_at)) }}</td>
                                                    </tr>
                                                    <tr class="bg-light">
                                                        <td class="text-bold-800">Total</td>
                                                        <td class="text-bold-800 text-end">{{ $items->total_price }}-Rs
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @if (!$items->description == '')
                                            <p>
                                                <b>Description:</b> {{ $items->description }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="h-1">
                        <div class="page_break"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
