<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="content text-white ">
        <div class="container">
            <h2>Customer Data</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>NIC</th>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>COD</th>
                        <th>Weight</th>
                        <th>Origin City</th>
                        <th>Destination City</th>
                        <th>Origin Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer['customer_name'] }}</td>
                        <td>{{ $customer['customer_address'] }}</td>
                        <td>{{ $customer['customer_nic'] }}</td>
                        <td>{{ $customer['order_id'] }}</td>
                        <td>{{ $customer['product_id'] }}</td>
                        <td>{{ $customer['product_name'] }}</td>
                        <td>{{ $customer['customer_phone'] }}</td>
                        <td>{{ $customer['customer_email'] }}</td>
                        <td>{{ $customer['cod'] }}</td>
                        <td>{{ $customer['weight'] }}</td>
                        <td>{{ $customer['origin_city_name'] }}</td>
                        <td>{{ $customer['destination_city_name'] }}</td>
                        <td>{{ $customer['origin_country'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>