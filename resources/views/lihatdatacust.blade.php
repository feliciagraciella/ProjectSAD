<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>CUSTOMER</h1>

    <table border='1'>
        <tr>
            <th>USER_NAME</th>
            <th>USER_PASS</th>
            <th>CUST_FULL_NAME</th>
            <th>CUST_PHONE</th>
            <th>CUST_ADDRESS</th>
            <th>CUST_CITY</th>
            <th>CUST_COUNTRY</th>
            <th>CUST_DEL_STATUS</th>
        </tr>
        @forelse($customer as $cust)
        <tr>
            <td>{{ $cust->USER_NAME }}</td>
            <td>{{ $cust->USER_PASS }}</td>
            <td>{{ $cust->CUST_FULL_NAME }}</td>
            <td>{{ $cust->CUST_PHONE }}</td>
            <td>{{ $cust->CUST_ADDRESS }}</td>
            <td>{{ $cust->CUST_CITY }}</td>
            <td>{{ $cust->CUST_COUNTRY }}</td>
            <td>{{ $cust->CUST_DEL_STATUS }}</td>
        </tr>
        @empty
            <h1 color="red">TIDAK ADA DATA!</h1>
        @endforelse
    </table>

</body>
</html>
