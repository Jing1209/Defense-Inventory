@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Setting</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('settings.edit', auth()->user()->id) }}">
                        <div class="btn btn-primary">Update</div>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile</h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                                @endif
                                <img src="{{ asset('assets/images/img2.jpg') }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ Auth()->user()->name }}</h5>
                                <p class="text-muted mb-1">{{ Auth()->user()->email }}</p>

                                <div class="d-flex justify-content-center mx-2 mb-2 mt-5">
                                    <div class="row">
                                        <div class="col-md-12 my-3">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#editUser1">Reset Password</button>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="{{ route('settings.edit', auth()->user()->id) }}"
                                                class="btn btn-warning">Update Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div class="modal fade" id="editUser1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Please input old password!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('resets.update', auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12"><label>Old password :</label></div>
                                    <div class="col-12"><input class="form-control form-control-lg" type="password"
                                            name="old_password" id="old_password" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12"><label>New password :</label></div>
                                    <div class="col-12"><input class="form-control form-control-lg" type="password"
                                            name="password" id="password" /></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12"><label>Confirm password :</label></div>
                                    <div class="col-12"><input class="form-control form-control-lg" type="password"
                                            name="confirm_password" id="confirm_passowrd" /></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    @endsection
