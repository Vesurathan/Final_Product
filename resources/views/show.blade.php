<div class="content">
    <div class="container">
        <h2>Customer Data</h2>
        <table class="table" border="2px">
            <thead>
                <tr>
                    <th>#</th>
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