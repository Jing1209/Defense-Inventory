@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-4 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-8 align-self-center">
                <div class="customize-input float-right">
                    {{-- <button class="btn btn-danger" onclick="print()" value="Print PDF"></button> --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="dropdown show">
                                <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Generate PDF
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/allrecord">All Record</a>
                                    <a class="dropdown-item" href="/thisweek">This week</a>
                                    <a class="dropdown-item" href="/borrowed">Borrowed</a>
                                    <a class="dropdown-item" href="/returned">Returned</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('transactions.create') }}">
                                <div class="btn btn-primary">Add New</div>
                            </a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9 right-0">
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="printPDF">
                        <div class="table-responsive">
                            <table id="multi_col_order"
                                class="table dataTables table-striped table-bordered display no-wrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Item Code</th>
                                        <th>Item Model</th>
                                        <th>Room</th>
                                        <th>Building</th>
                                        <th>Condition</th>
                                        <th>Employee</th>
                                        <th>Borrowed Date</th>
                                        <th>Returned Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $i => $trx)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('images/item/' . $trx->Image) }}"
                                                    style="height: 50px;width:60px;">
                                            </td>
                                            <td>{{ $trx->item_code }}</td>
                                            <td>{{ $trx->itemName }}</td>
                                            <td>{{ $trx->room_name }}</td>
                                            <td>{{ $trx->building_name }}</td>
                                            <td>
                                                @if ($trx->condition == 'Good')
                                                    <div class="text-success">{{ $trx->condition }}</div>
                                                @elseif($trx->condition == 'Medium')
                                                    <div class="text-primary">{{ $trx->condition }}</div>
                                                @elseif($trx->condition == 'Bad')
                                                    <div class="text-warning">{{ $trx->condition }}</div>
                                                @else
                                                    <div class="text-danger">{{ $trx->condition }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $trx->employee_name }}</td>
                                            <td>{{ $trx->borrowed_date }}</td>
                                            <td>
                                                @if ($trx->returned_date)
                                                    {{ $trx->returned_date }}
                                                @else
                                                    <div class="text-danger">Borrowed</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($trx->state == 'Borrowed')
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#view{{ $trx->id }}">View</button>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edit{{ $trx->id }}">Return</button>
                                                    <button type="button" hidden class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete{{ $trx->id }}">Delete</button>
                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade" id="view{{ $trx->id }}" tabindex="1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Large
                                                                        modal
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div
                                                                                        class="w-100 text-start text-primary">
                                                                                        <p><b>Item Code: </b></p>
                                                                                        <p><b>Item Model</b></p>
                                                                                        <p><b>Building: </b></p>
                                                                                        <p><b>Room: </b></p>
                                                                                        <p><b>Employee: </b></p>
                                                                                        <p><b>Condition: </b></p>
                                                                                        <p><b>Borrowed Date: </b></p>
                                                                                        <p><b>Returned Date: </b></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 text-end">
                                                                                    <div class="w-100 text-start">
                                                                                        <p>{{ $trx->item_code }}</p>
                                                                                        <p>{{ $trx->itemName }}</p>
                                                                                        <p>{{ $trx->building_name }}</p>
                                                                                        <p>{{ $trx->room_name }}</p>
                                                                                        <p>{{ $trx->employee_name }}</p>
                                                                                        <p>
                                                                                            @if ($trx->condition == 'Good')
                                                                                                <div class="text-success">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @elseif($trx->condition == 'Medium')
                                                                                                <div class="text-primary">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @elseif($trx->condition == 'Bad')
                                                                                                <div class="text-warning">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @else
                                                                                                <div class="text-danger">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @endif
                                                                                        </p>
                                                                                        <p>{{ $trx->borrowed_date }}</p>
                                                                                        <p>
                                                                                            @if ($trx->returned_date)
                                                                                                {{ $trx->returned_date }}
                                                                                            @else
                                                                                                <div class="text-danger">
                                                                                                    Borrowed</div>
                                                                                            @endif
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 align-items-center">
                                                                            <img id="output" width="300"
                                                                                height="200"
                                                                                src="{{ asset('images/item/' . $trx->Image) }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade" id="delete{{ $trx->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Delete
                                                                        employee</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body"
                                                                    style="align-items: center; right: 0px;">
                                                                    <b>
                                                                        <center>Do you want to delete {{ $trx->id }}
                                                                            ?</center>
                                                                    </b>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('transactions.destroy', $trx->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                @else
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#view{{ $trx->id }}">View</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete{{ $trx->id }}">Delete</button>
                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade" id="view{{ $trx->id }}" tabindex="1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Large
                                                                        modal
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div
                                                                                        class="w-100 text-start text-primary">
                                                                                        <p><b>Item Code: </b></p>
                                                                                        <p><b>Item Model:</b></p>
                                                                                        <p><b>Building: </b></p>
                                                                                        <p><b>Room: </b></p>
                                                                                        <p><b>Employee: </b></p>
                                                                                        <p><b>Condition: </b></p>
                                                                                        <p><b>Borrowed Date: </b></p>
                                                                                        <p><b>Returned Date: </b></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 text-end">
                                                                                    <div class="w-100 text-start">
                                                                                        <p>{{ $trx->item_code }}</p>
                                                                                        <p>{{ $trx->itemName }}</p>
                                                                                        <p>{{ $trx->building_name }}</p>
                                                                                        <p>{{ $trx->room_name }}</p>
                                                                                        <p>{{ $trx->employee_name }}</p>
                                                                                        <p>
                                                                                            @if ($trx->condition == 'Good')
                                                                                                <div class="text-success">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @elseif($trx->condition == 'Medium')
                                                                                                <div class="text-primary">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @elseif($trx->condition == 'Bad')
                                                                                                <div class="text-warning">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @else
                                                                                                <div class="text-danger">
                                                                                                    {{ $trx->condition }}
                                                                                                </div>
                                                                                            @endif
                                                                                        </p>
                                                                                        <p>{{ $trx->borrowed_date }}</p>
                                                                                        <p>
                                                                                            @if ($trx->returned_date)
                                                                                                {{ $trx->returned_date }}
                                                                                            @else
                                                                                                <div class="text-danger">
                                                                                                    Borrowed</div>
                                                                                            @endif
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 align-items-center">
                                                                            <img id="output" width="300"
                                                                                height="200"
                                                                                src="{{ asset('images/item/' . $trx->Image) }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade" id="delete{{ $trx->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Delete
                                                                        employee</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body"
                                                                    style="align-items: center; right: 0px;">
                                                                    <b>
                                                                        <center>Do you want to delete {{ $trx->id }}
                                                                            ?</center>
                                                                    </b>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('transactions.destroy', $trx->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                @endif

                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="edit{{ $trx->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Please
                                                                    input returned date and Condition!</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('transactions.update', $trx->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <label for="ReturnedDate"
                                                                                class="form-label"><b
                                                                                    class="text-danger">*</b>Returned
                                                                                Date</label>
                                                                            <input type="date" name="returned_date"
                                                                                class="form-control form-control-lg"
                                                                                id="ReturnedDate"
                                                                                placeholder="Returned Date"
                                                                                @error('returned date') is-invalid @enderror />

                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <label class="mb-2 pb-1"><b
                                                                                            class="text-danger">*</b>Condition:
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            name="condition"
                                                                                            type="radio" id="Good"
                                                                                            value="Good" checked />
                                                                                        <label class="form-check-label"
                                                                                            for="femaleGender">Good</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            name="condition"
                                                                                            type="radio" id="Medium"
                                                                                            value="Medium" />
                                                                                        <label class="form-check-label"
                                                                                            for="maleGender">Meduim</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            name="condition"
                                                                                            type="radio" id="Bad"
                                                                                            value="Bad" />
                                                                                        <label class="form-check-label"
                                                                                            for="Bad">Bad</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            name="condition"
                                                                                            type="radio" id="Broken"
                                                                                            value="Broken" />
                                                                                        <label class="form-check-label"
                                                                                            for="Broken">Broken</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-success">Return</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                    {{-- </div> --}}
                                                    <!-- /.modal -->

                                                    {{-- delete modal --}}

                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade" id="delete{{ $trx->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Delete
                                                                        employee</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body"
                                                                    style="align-items: center; right: 0px;">
                                                                    <b>
                                                                        <center>Do you want to delete {{ $trx->id }}
                                                                            ?</center>
                                                                    </b>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('transactions.destroy', $trx->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->


                                                    <!--  Modal content for the above example -->
                                                    <div class="modal fade" id="view{{ $trx->id }}" tabindex="1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myLargeModalLabel">Large
                                                                        modal
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div
                                                                                        class="w-100 text-start text-primary">
                                                                                        <p><b>Item Code: </b></p>
                                                                                        <p><b>Building: </b></p>
                                                                                        <p><b>Room: </b></p>
                                                                                        <p><b>Employee</b></p>
                                                                                        <p><b>Borrowed Date: </b></p>
                                                                                        <p><b>Returned Date: </b></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 text-end">
                                                                                    <div class="w-100 text-start">
                                                                                        <p>{{ $trx->item_code }}</p>
                                                                                        <p>{{ $trx->building_name }}</p>
                                                                                        <p>{{ $trx->room_name }}</p>
                                                                                        <p>{{ $trx->employee_name }}</p>
                                                                                        <p>{{ $trx->borrowed_date }}</p>
                                                                                        <p>{{ $trx->returned_date }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 align-items-center">
                                                                            <img id="output" width="300"
                                                                                height="200"
                                                                                src="{{ asset('images/item/' . $trx->Image) }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
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
@endsection
<script>
    let print = () => {
        window.print();
    }
</script>
