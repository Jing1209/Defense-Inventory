@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/home" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-dark active" aria-current="page">Transactions</li>
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
                                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transaction</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                            </div>

                    </div>
                    <div class="mt-4 pt-2">
                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                        <a href="{{ route('items.index') }}" class="btn btn-danger btn-lg">Cancel</a>
                    </div>
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
    var x = document.getElementById("query").value;
    document.getElementById("item_code").innerHTML = x;
</script>
