@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Sponsor</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Sponsor</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('sponsors.create') }}">
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Sponsor</h4>
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
                                        <th>First name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sponsors as $i => $sponsor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $sponsor->sponsor_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#view{{ $sponsor->id }}">View</button>
                                                <a class="btn btn-warning"
                                                    href="{{ route('sponsors.edit', $sponsor->id) }}">Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $sponsor->id }}">Delete</button>
                                                {{-- delete modal --}}
                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="delete{{ $sponsor->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Delete
                                                                    sponsor</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body"
                                                                style="align-items: center; right: 0px;">
                                                                <b>
                                                                    <center>Do you want to delete {{ $sponsor->name }}
                                                                        ?</center>
                                                                </b>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('sponsors.destroy', $sponsor->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-footer">
                                                                            <a href="{{ route('sponsors.index') }}" class="btn btn-primary">Cancel</a>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->


                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="view{{ $sponsor->id }}" tabindex="-1"
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
                                                                        <p><b>ID: </b></p>
                                                                        <p><b>Sponsor Name: </b></p>
                                                                        <p><b>Created At: </b></p>
                                                                    </div>
                                                                    <div class="col-md-6 text-end">
                                                                        <p>{{ $sponsor->id }}</p>
                                                                        <p>{{ $sponsor->sponsor_name }}
                                                                        <p>{{ $sponsor->created_at }}</p>
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
                            <div class="d-flex justify-content-center">
                                {!! $sponsors->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
