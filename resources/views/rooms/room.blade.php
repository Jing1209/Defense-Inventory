@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Room</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Room</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('rooms.create') }}">
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Room</h4>
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
                                        <th>Building name</th>
                                        <th>Room name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $i => $room)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $room->building_name }}</td>
                                            <td>{{ $room->room_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#view{{ $room->id }}">View</button>
                                                <a class="btn btn-warning"
                                                    href="{{ route('rooms.edit', $room->id) }}">Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $room->id }}">Delete</button>
                                                {{-- delete modal --}}
                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="delete{{ $room->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">Delete
                                                                    room</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body"
                                                                style="align-items: center; right: 0px;">
                                                                <b>
                                                                    <center>Do you want to delete {{ $room->id }}
                                                                        ?</center>
                                                                </b>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('rooms.destroy', $room->id) }}"
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
                                                <div class="modal fade" id="view{{ $room->id }}" tabindex="-1"
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
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="w-100 text-start text-primary">
                                                                                    <p><b>ID: </b></p>
                                                                                    <p><b>Building Name: </b></p>
                                                                                    <p><b>Room Name</b></p>
                                                                                    <p><b>Created At: </b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <div class="w-100 text-start">
                                                                                    <p>{{ $room->id }}</p>
                                                                                    <p>{{ $room->building_name }}</p>
                                                                                    <p>{{ $room->room_name }}</p>
                                                                                    <p>{{ $room->created_at }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                {!! $rooms->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
