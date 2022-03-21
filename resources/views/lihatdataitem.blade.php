<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>ITEM</h1>

    <table border='1'>
        <tr>
            <th>ITEM_NAME</th>
            <th>ITEM_COLOR</th>
            <th>ITEM_SIZE</th>
            <th>ITEM_STOCK</th>
            <th>ITEM_PRICE</th>
        </tr>
        @forelse($item as $item)
        <tr>
            <td>{{ $item->ITEM_NAME }}</td>
            <td>{{ $item->ITEM_COLOR }}</td>
            <td>{{ $item->ITEM_SIZE }}</td>
            <td>{{ $item->ITEM_STOCK }}</td>
            <td>{{ $item->ITEM_PRICE }}</td>
        </tr>
        @empty
            <h1 color="red">TIDAK ADA DATA!</h1>
        @endforelse
    </table>

</body>
</html>
