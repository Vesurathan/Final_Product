<div class="content">
    <div class="container">
        <h2>Customer Form</h2>
        <form action="{{ route('customer_data.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name">
            </div>
            <div class="mb-3">
                <label for="customer_address" class="form-label">Customer Address</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address">
            </div>
            <div class="mb-3">
                <label for="Customer_nic" class="form-label">Customer NIC</label>
                <input type="text" class="form-control" id="Customer_nic" name="Customer_nic">
            </div>
            <div class="mb-3">
                <label for="order_id" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="order_id" name="order_id">
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="product_id" name="product_id">
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name">
            </div>
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Customer Phone</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone">
            </div>
            <div class="mb-3">
                <label for="customer_email" class="form-label">Customer Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email">
            </div>
            <div class="mb-3">
                <label for="cod" class="form-label">COD</label>
                <input type="text" class="form-control" id="cod" name="cod">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="text" class="form-control" id="weight" name="weight">
            </div>
            <div class="mb-3">
                <label for="origin_city_name" class="form-label">Origin City Name</label>
                <input type="text" class="form-control" id="origin_city_name" name="origin_city_name">
            </div>
            <div class="mb-3">
                <label for="destination_city_name" class="form-label">Destination City Name</label>
                <input type="text" class="form-control" id="destination_city_name" name="destination_city_name">
            </div>
            <div class="mb-3">
                <label for="origin_country" class="form-label">Origin Country</label>
                <input type="text" class="form-control" id="origin_country" name="origin_country">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>