@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">item</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('items.index') }}" class="text-muted">item</a>
                            </li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Add item</li>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add item</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('item_code')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="text" id="firstName" name="item_code"
                                                    class="form-control form-control-lg" placeholder="Item Code"
                                                    @error('item_code') is-invalid @enderror />
                                                <label class="form-label" for="firstName"><b class="text-danger">*</b>Item
                                                    Code</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('item_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="text" id="lastName" name="item_name"
                                                    class="form-control form-control-lg" placeholder="Item Name"
                                                    @error('item_name') is-invalid @enderror />
                                                <label class="form-label" for="lastName"><b class="text-danger">*</b>Item
                                                    Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                @error('category_id')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="row">
                                                    <div class="col-12">
                                                        <select name="category_id" class="p-2 w-100vh rounded-2"
                                                            @error('category_id') is-invalid @enderror>
                                                            <option value=""><b class="text-danger">Choose
                                                                    Category</b></option>
                                                            @foreach ($categories as $category)
                                                                <option value={{ $category->id }}>
                                                                    {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label" for="itemName"><b
                                                                class="text-danger">*</b>Category Name</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="mb-2 pb-1"><b class="text-danger">*</b>Status: </h6>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="status" type="radio"
                                                    name="inlineRadioOptions" id="femaleGender" value="Returned" checked />
                                                <label class="form-check-label" for="femaleGender">Returned</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="status" type="radio"
                                                    name="inlineRadioOptions" id="maleGender" value="Borrowed" />
                                                <label class="form-check-label" for="maleGender">Borrowed</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('sponsor_id')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="row">
                                                    <div class="col-12">
                                                        <select name="sponsor_id" class="p-2 w-100vh rounded-2"
                                                            @error('sponsor_id') is-invalid @enderror>
                                                            <option value=""><b class="text-danger">Choose
                                                                    Sponsor</b></option>
                                                            @foreach ($sponsors as $sponsor)
                                                                <option value={{ $sponsor->id }}>
                                                                    {{ $sponsor->sponsor_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label" for="itemName"><b
                                                                class="text-danger">*</b>Sponsor Name</label>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('price')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="float" id="phoneNumber" name="price"
                                                    class="form-control   form-control-lg" placeholder="Price"
                                                    @error('price') is-invalid @enderror />
                                                <label class="form-label" for="phoneNumber"><b
                                                        class="text-danger">*</b>Price</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Description</h4>
                                                    <form class="mt-3">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="description" rows="5" placeholder="Description..."></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                <a href="{{ route('items.index') }}" class="btn btn-danger btn-lg">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
