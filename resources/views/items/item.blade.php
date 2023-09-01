@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Item</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Item</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('items.create') }}">
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Item</h4>
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
                                        <th>Item code</th>
                                        <th>Item name</th>
                                        <th>Condition</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Sponsor</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $i => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $item->item_code}}
                                            </td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>
                                                @if($item->condition == 'Good')
                                                    <div class="text-success">{{ $item->condition}}</div>
                                                @elseif($item->condition == 'Medium')
                                                    <div class="text-primary">{{ $item->condition}}</div>
                                                @elseif($item->condition == 'Bad')
                                                    <div class="text-warning">{{ $item->condition}}</div>
                                                @else
                                                    <div class="text-danger">{{ $item->condition}}</div>
                                                @endif
                                            </td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->sponsor_name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td><img src="{{ asset('images/item/' . $item->image) }}"
                                                style="height: 50px;width:60px;"></td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#view{{ $item->id }}">View</button>
                                                <a class="btn btn-warning"
                                                    href="{{ route('items.edit', $item->id) }}">Edit</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete{{ $item->id }}">Delete</button>
                                                {{-- delete modal --}}
                                                <!--  Modal content for the above example -->
                                                <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
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
                                                                    <center>Do you want to delete {{ $item->item_name }}
                                                                        ?</center>
                                                                </b>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('items.destroy', $item->id) }}"
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
                                                <div class="modal fade" id="view{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel">View Item
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
                                                                                    <p><b>Item Code: </b></p>
                                                                                    <p><b>Item name: </b></p>
                                                                                    <p><b>Description: </b></p>
                                                                                    <p><b>Sponsor: </b></p>
                                                                                    <p><b>Category: </b></p>
                                                                                    <p><b>Price: </b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <div class="w-100 text-start">
                                                                                    <p>{{ $item->id }}</p>
                                                                                    <p>{{ $item->item_code }}</p>
                                                                                    <p>{{ $item->item_name }}</p>
                                                                                    <p>{{ $item->description }}</p>
                                                                                    <p>{{ $item->sponsor_name }}</p>
                                                                                    <p>{{ $item->category_name }}</p>
                                                                                    <p>{{ $item->price }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <img id="output" width="300" height="200"
                                                                        src="{{ asset('images/item/' . $item->image) }}" />
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
