<link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<div class="container py-5 printpdf">
    <div class="card">
        <div class="card-header">
            <div class="text-primary text-center">
                <button class="btn btn-danger" onClick="print()">Transaction Returned Reports</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Item Code</th>
                        <th>Item Model</th>
                        <th>Room</th>
                        <th>Building</th>
                        <th>Condition</th>
                        <th>Employee</th>
                        <th>Borrowed Date</th>
                        <th>Returned Date</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $i => $trx)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                <img src="{{ asset('images/item/' . $trx->Image) }}" style="height: 50px;width:60px;">
                            </td>
                            <td>{{ $trx->item_code }}</td>
                            <td>{{ $trx->itemName }}</td>
                            <td>{{ $trx->room_name }}</td>
                            <td>{{ $trx->building_name }}</td>
                            <td>
                                @if ($trx->condition == 'Good')
                                    <div class="text-success">{{ $trx->condition }}</div>
                                @elseif($trx->condition == 'Medium')
                                    <div class="text-primary">{{ $trx->condition }}</div>
                                @elseif($trx->condition == 'Bad')
                                    <div class="text-warning">{{ $trx->condition }}</div>
                                @else
                                    <div class="text-danger">{{ $trx->condition }}</div>
                                @endif
                            </td>
                            <td>{{ $trx->employee_name }}</td>
                            <td>{{ $trx->borrowed_date }}</td>
                            <td>
                                @if ($trx->returned_date)
                                    {{ $trx->returned_date }}
                                @else
                                    <div class="text-danger">Borrowing</div>
                                @endif
                            </td>
                            <td>
                                @if ($trx->state == 'Returned')
                                    <div class="text-success">{{ $trx->state }}</div>
                                @else
                                    <div class="text-danger">{{ $trx->state }}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
        let print = () => {
        window.print();
    }
</script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
