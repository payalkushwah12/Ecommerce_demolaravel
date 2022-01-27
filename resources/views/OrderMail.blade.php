<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
    <div class="container text-center">
        <h2>E Shopper</h2>
        <h3>Thank you for ordering from us! ..Your order will be deliverd soon.</h3>
        <h4>Your Order Details</h4>
        <p>Your Order Id is : {{$details['orderid']}}</p>
        <p> Your order will sent to this address: {{ $details['address'] }}</p>
        <p> Your Payment Mode is : {{ $details['paymentmethod'] }}</p>
        <table border="1">
            <tbody>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Total Amount</th>
                </tr>
                <tr>
                    <td>{{$details['product_name']}}</td>
                    <td>Rs. {{$details['product_price']}}</td>
                    <td>{{$details['product_quantity']}}</td>
                    <td>Rs.{{$details['total_amount'] }}</td>
                </tr>
            </tbody>
        </table>
        <p>Keep ordering :)</p>
    </div>
    @include('includes.foot')
</body>
</html>
