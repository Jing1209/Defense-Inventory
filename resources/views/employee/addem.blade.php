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
                            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}"
                                    class="text-muted">Employee</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Add Employee</li>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add Employee</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                        @endif
                        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('first_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="firstName"><b class="text-danger">*</b>First Name</label>
                                                <input type="text" id="firstName" name="first_name"
                                                    class="form-control form-control-lg" placeholder="First Name"
                                                    @error('first_name') is-invalid @enderror />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                @error('last_name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="lastName"><b class="text-danger">*</b>Last Name</label>
                                                <input type="text" id="lastName" name="last_name"
                                                    class="form-control form-control-lg" placeholder="Last Name"
                                                    @error('last_name') is-invalid @enderror />
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                @error('birthday')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="birthdayDate" class="form-label"><b class="text-danger">*</b>Birthday</label>
                                                <input type="date" name="birthday" class="form-control form-control-lg"
                                                    id="birthdayDate" placeholder="Birthday"
                                                    @error('birthday') is-invalid @enderror />
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="mb-2 pb-1"><b class="text-danger">*</b>Gender: </h6>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    name="inlineRadioOptions" id="femaleGender" value="Female" checked />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    name="inlineRadioOptions" id="maleGender" value="Male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="gender" type="radio"
                                                    name="inlineRadioOptions" id="otherGender" value="Other" />
                                                <label class="form-check-label" for="otherGender">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('email')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="emailAddress"><b class="text-danger">*</b>Email</label>
                                                <input type="email" id="emailAddress" name="email"
                                                    class="form-control   form-control-lg" placeholder="Email"
                                                    @error('email') is-invalid @enderror />
                                                
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                @error('phone_number')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="form-label" for="phoneNumber"><b class="text-danger">*</b>Phone Number</label>
                                                <input type="text" id="phoneNumber" name="phone_number"
                                                    class="form-control   form-control-lg" placeholder="Phone Number"
                                                    @error('phone_number') is-invalid @enderror />
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <div class="row">
                                            <div class="border text-center">
                                                <b class="text-danger">*</b>
                                                <img id="output" width="380px" height="400px" src="{{ asset('assets/images/user-logo.png') }}" />
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
                                <a href="{{ route('employees.index') }}" class="btn btn-danger btn-lg">Cancel</a>
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
