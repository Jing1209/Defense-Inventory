@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="row">
                                <!-- Column -->
                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                    <div class="card card-hover myCard">
                                        <div class="p-2 bg-light text-center myCard">
                                            <img src="{{asset('assets/images/man.png')}}" alt="employee" width="40">
                                            <h2 class="font-light text-dark">{{ $countEmp }}</h2>
                                            <h6 class="text-dark">Total Employees</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                    <div class="card card-hover myCard">
                                        <div class="p-2 bg-light text-center myCard">
                                            <img src="{{asset('assets/images/item.png')}}" alt="item" width="40">
                                            <h2 class="font-light text-dark">{{ $countAll }}</h2>
                                            <h6 class="text-dark">Total Items</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                    <div class="card card-hover myCard">
                                        <div class="p-2 bg-light text-center myCard">
                                            <img src="{{asset('assets/images/transaction.png')}}" alt="transaction" width="40">
                                            <h2 class="font-light text-dark">{{ $countTrx }}</h2>
                                            <h6 class="text-dark">Total Transactions</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <div class="col-md-6 col-lg-3 col-xlg-3">
                                    <div class="card card-hover myCard">
                                        <div class="p-2 bg-light text-center myCard">
                                            <img src="{{asset('assets/images/donation.png')}}" alt="sponsor" width="40">
                                            <h2 class="font-light text-dark">{{ $countSponsor }}</h2>
                                            <h6 class="text-dark">Total Sponsor</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="text-primary">Item</h3> --}}
                                <div class="row">
                                    <div class="col-9 right-0">
                                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Total Item Details
                                        </h3>
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <div class="customize-input float-right">
                                            <a href="{{ route('items.index') }}">
                                                <div class="btn btn-primary">Go to item List</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover myCard">
                                            <div class="p-2 bg-success text-center myCard">
                                                <h1 class="font-light text-white">{{ $countGood }}</h1>
                                                <h6 class="text-white">Total Good</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover myCard">
                                            <div class="p-2 bg-primary text-center myCard">
                                                <h1 class="font-light text-white">{{ $countMedium }}</h1>
                                                <h6 class="text-white">Total Medium</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover myCard">
                                            <div class="p-2 bg-warning text-center myCard">
                                                <h1 class="font-light text-white">{{ $countBad }}</h1>
                                                <h6 class="text-white">Total Bad</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover myCard">
                                            <div class="p-2 bg-danger text-center myCard">
                                                <h1 class="font-light text-white">{{ $countBroken }}</h1>
                                                <h6 class="text-white">Total Broken</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9 right-0">
                                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction
                                        </h3>
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <div class="customize-input float-right">
                                            <a href="{{ route('transactions.index') }}">
                                                <div class="btn btn-primary">Go to transaction List</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Code</th>
                                                <th>Item Image</th>
                                                <th>Building</th>
                                                <th>Room</th>
                                                <th>Employee</th>
                                                <th>Status</th>
                                                <th>Borrowed date</th>
                                                <th>Returned date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $trx)
                                                <tr>
                                                    <td>
                                                        {{ $trx->id }}
                                                    </td>
                                                    <td>
                                                        {{ $trx->item_code }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('images/item/' . $trx->Image) }}"
                                                            style="height: 50px;width:60px;">
                                                    </td>
                                                    <td>
                                                        {{ $trx->building_name }}
                                                    </td>
                                                    <td>
                                                        {{ $trx->room_name }}
                                                    </td>
                                                    <td>
                                                        {{ $trx->employee_name }}
                                                    </td>
                                                    <td>
                                                        @if ($trx->state == 'Returned')
                                                            <div class="text-success">{{ $trx->state }}</div>
                                                        @else
                                                            <div class="text-warning">{{ $trx->state }}</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $trx->borrowed_date }}
                                                    </td>
                                                    <td>
                                                        @if ($trx->returned_date)
                                                            {{ $trx->returned_date }}
                                                        @else
                                                            <div class="text-danger">NULL</div>
                                                        @endif
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
            </div>
        </div>
        <style>
            .myCard {
                border-radius: 10px;
                padding: 0px 10px;
            }
        </style>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    @endsection
