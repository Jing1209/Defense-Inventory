@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employee</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('employees.create') }}">
                        <div class="btn btn-primary">Add New</div>
                    </a>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Employee</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi_col_order"
                                class="table dataTables table-striped table-bordered display no-wrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Birthday</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $i => $employee)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset('images/employee/' . $employee->image) }}"
                                                    style="height: 50px;width:60px;">
                                            </td>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->birthday }}</td>
                                            <td>0{{ $employee->phone_number }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#view{{ $employee->id }}">View</button>
                                                <a class="btn btn-warning"
                                                    href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $employee->id }}">Delete</button>
                                                {{-- delete modal --}}
                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="delete{{ $employee->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Delete
                                                                    employee</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body"
                                                                style="align-items: center; right: 0px;">
                                                                <b>
                                                                    <center>Do you want to delete {{ $employee->name }}
                                                                        ?</center>
                                                                </b>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('employees.destroy', $employee->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->


                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="view{{ $employee->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="w-100 text-start text-primary">
                                                                                    <p><b>ID: </b></p>
                                                                                    <p><b>Name: </b></p>
                                                                                    <p><b>Gender: </b></p>
                                                                                    <p><b>Birthday</b></p>
                                                                                    <p><b>Email: </b></p>
                                                                                    <p><b>Phone Number: </b></p>
                                                                                    <p><b>Created At: </b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <div class="w-100 text-start">
                                                                                    <p>{{ $employee->id }}</p>
                                                                                    <p>{{ $employee->first_name }}
                                                                                        {{ $employee->last_name }}</p>
                                                                                    <p>{{ $employee->gender }}</p>
                                                                                    <p>{{ $employee->birthday }}</p>
                                                                                    <p>{{ $employee->email }}</p>
                                                                                    <p>0{{ $employee->phone_number }}</p>
                                                                                    <p>{{ $employee->created_at }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 align-items-center">
                                                                        <img id="output" width="200" height="300"
                                                                            src="{{ asset('images/employee/' . $employee->image) }}" />
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
