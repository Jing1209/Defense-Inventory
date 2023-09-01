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
                        <form method="POST" action="{{ route('settings.update', auth()->user()->id) }}">
                            @csrf
                            @METHOD('PUT')
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-12 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-12 col-form-label text-md-end">{{ __('Email') }}</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" value="{{ auth()->user()->email }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 mx-2">
                                <button type="submit" class=" mx-2 btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('settings.index') }}" class=" mx-2 btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
