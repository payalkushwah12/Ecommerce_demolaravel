@extends('master')
@section('content')
<div class="jumbotron container">
<h1 class="text-center mt-3 mb-3"> User Orders </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">User email</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product id</th>
          <th scope="col">Product Quantity</th>
          <th scope="col">Product Price</th>
          <th scope="col">Order Status</th>
          <th scope="col">Total Amount</th>
          <th scope="col">Action</th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($userdata as $data)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$data->user_email}}</td>
            <td>{{$data->product_name}}</td>
            <td>{{$data->product_id}}</td>
            <td>{{$data->product_quantity}}</td>
            <td>{{$data->product_price}}</td>
            <td>{{$data->order_status}}</td>
            <td>{{$data->total_amount}}</td>
            <td><a href="/dashboard/editOrderStatus/{{$data->id}}" class="btn btn-primary">Edit Order Status</a></td>
            </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 