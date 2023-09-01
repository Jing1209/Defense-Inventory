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
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                        @endif
                        <form action="{{ route('items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('item_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="itemCode"><b class="text-danger">*</b>Item
                                                    Code</label>
                                                <input type="text" id="fitemName" name="item_code"
                                                    value="{{ $item->item_code }}" class="form-control form-control-lg"
                                                    placeholder="item Code" @error('item_code') is-invalid @enderror />

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('item_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="itemName"><b class="text-danger">*</b>Item
                                                    Name</label>
                                                <input type="text" id="fitemName" name="item_name"
                                                    value="{{ $item->item_name }}" class="form-control form-control-lg"
                                                    placeholder="item Name" @error('item_name') is-invalid @enderror />

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('item_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label" for="itemName"><b
                                                                class="text-danger">*</b>Category</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select name="category_id" class="p-2 w-100vh rounded-2"
                                                            @error('category_id') is-invalid @enderror>
                                                            <option value=""><b class="text-danger">Choose
                                                                    Category</b></option>
                                                            @foreach ($categories as $category)
                                                                    <option value={{ $category->id }} {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('item_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label" for="itemName"><b
                                                                class="text-danger">*</b>Sponsor</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select name="sponsor_id" class="p-2 w-100vh rounded-2"
                                                            @error('room_name') is-invalid @enderror>
                                                            <option value=""><b class="text-danger">Choose
                                                                    Sponsor</b></option>
                                                            @foreach ($sponsors as $sponsor)
                                                                    <option value={{ $sponsor->id }} {{ $item->sponsor_id == $sponsor->id ? 'selected' : '' }}>
                                                                    {{ $sponsor->sponsor_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="row">
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                        @error('condition')
                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <h6 class="mb-2 pb-1"><b class="text-danger">*</b>Condition: </h6>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="condition" type="radio" id="Good" value="Good" checked {{ $item->condition == 'Good' ? 'checked' : '' }}/>
                                                            <label class="form-check-label" for="femaleGender">Good</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="condition" type="radio" id="Medium" value="Medium" {{ $item->condition == 'Medium' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="maleGender">Meduim</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="condition" type="radio" id="Bad" value="Bad" {{ $item->condition == 'Bad' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="Bad">Bad</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="condition" type="radio" id="Broken" value="Broken" {{ $item->condition == 'Broken' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="Broken">Broken</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-outline">
                                                        @error('item_name')
                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label class="form-label" for="itemName"><b
                                                                class="text-danger">*</b>Item
                                                            Price</label>
                                                        <input type="number" id="fitemName" name="price" value="{{$item->price}}"
                                                            class="form-control form-control-lg" placeholder="Item Price"
                                                            @error('item_name') is-invalid @enderror />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    @error('item_name')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <label class="form-label" for="itemName"><b
                                                            class="text-danger">*</b>Item
                                                        Description</label>
                                                    <textarea name="description" id="" cols="50" rows="5" value="{{ $item->description }}">{{ $item->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <div class="row">
                                                    <div class="border text-center">
                                                        <img id="output" width="400" height="300" src="{{ asset('images/item/'.$item->image) }}" />
                                                    </div>
                                                    <div class="d-flex my-3">
                                                        <input type="file" name="image" id="actual-btn" onchange="loadFile(event)" hidden>
                                                        <label style="cursor: pointer;" class="bg-success text-white p-2 rounded text-center" for="actual-btn">Choose File</label>
                                                        <div id="file-chosen" class="py-2 ps-2" style="width: 400px;">No file chosen</div>
                                                    </div>
                                                    @error('image')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                        <a href="{{ route('items.index') }}" class="btn btn-danger btn-lg">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    var fileChosen = document.getElementById('file-chosen');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        fileChosen.textContent = event.target.files[0].name
    };
</script>
