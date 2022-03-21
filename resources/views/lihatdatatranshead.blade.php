<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>TRANS_HEADER</h1>

    <table border='1'>
        <tr>
            <th>TRANS_ID</th>
            <th>CUST_USER_NAME</th>
            <th>TRANS_DATE</th>
            <th>TRANS_ITEM_COUNT</th>
            <th>TRANS_PAYMENT_METHOD</th>
            <th>TRANS_DEL_STATUS</th>
        </tr>
        @forelse($transhead as $th)
        <tr>
            <td>{{ $th->TRANS_ID }}</td>
            <td>{{ $th->CUST_USER_NAME }}</td>
            <td>{{ $th->TRANS_DATE }}</td>
            <td>{{ $th->TRANS_ITEM_COUNT }}</td>
            <td>{{ $th->TRANS_PAYMENT_METHOD }}</td>
            <td>{{ $th->TRANS_DEL_STATUS }}</td>
        </tr>
        @empty
            <h1 color="red">TIDAK ADA DATA!</h1>
        @endforelse
    </table>

</body>
</html>
