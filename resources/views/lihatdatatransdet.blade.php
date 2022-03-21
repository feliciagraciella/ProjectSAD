<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>TRANS_DETAIL</h1>

    <table border='1'>
        <tr>
            <th>TRANS_ID</th>
            <th>ITEM_ID</th>
            <th>TRANS_ITEM_QTY</th>
            <th>TRANS_ITEM_PRICE</th>
            <th>TRANS_ITEM_SUBTOTAL</th>
            <th>TRANS_DETAIL_DEL_STATUS</th>
        </tr>
        @forelse($transdet as $td)
        <tr>
            <td>{{ $td->TRANS_ID }}</td>
            <td>{{ $td->ITEM_ID }}</td>
            <td>{{ $td->TRANS_ITEM_QTY }}</td>
            <td>{{ $td->TRANS_ITEM_PRICE }}</td>
            <td>{{ $td->TRANS_ITEM_SUBTOTAL }}</td>
            <td>{{ $td->TRANS_DETAIL_DEL_STATUS }}</td>
        </tr>
        @empty
            <h1 color="red">TIDAK ADA DATA!</h1>
        @endforelse
    </table>

</body>
</html>
