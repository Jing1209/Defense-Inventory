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
                            <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}" class="text-muted">Room</a>
                            </li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Edit Room</li>
                        </ol>
                    </nav>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Room</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <form action="{{ route('rooms.update',$room->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <div class="row">
                                                    <div class="col-12">
                                                        @error('building_id')
                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <select name="building_id" class="p-2 w-100vh rounded-2"
                                                            @error('room_name') is-invalid @enderror>
                                                            <option value=""><b class="text-danger">Choose
                                                                    Building</b></option>
                                                            @foreach ($buildings as $build)
                                                                <option value={{ $build->id }}>
                                                                    {{ $build->building_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label" for="roomName"><b
                                                                class="text-danger">*</b>Building Name</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('room_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="text" id="froomName" name="room_name" value="{{ $room->room_name }}"
                                                    class="form-control form-control-lg" placeholder="Room Name"
                                                    @error('room_name') is-invalid @enderror />
                                                <label class="form-label" for="roomName"><b class="text-danger">*</b>Room
                                                    Name</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                <a href="{{ route('rooms.index') }}" class="btn btn-danger btn-lg">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
