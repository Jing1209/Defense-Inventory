@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Category</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}"
                                    class="text-muted">Category</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Add Category</li>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add Category</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                        @endif
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('category_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="text" id="fcategoryName" name="category_name"
                                                    class="form-control form-control-lg" placeholder="Category Name"
                                                    @error('category_name') is-invalid @enderror />
                                                <label class="form-label" for="categoryName"><b
                                                        class="text-danger">*</b>Category Name</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-danger btn-lg">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
