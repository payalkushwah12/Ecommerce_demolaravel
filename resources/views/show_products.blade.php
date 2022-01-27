@extends('master')
@section('content')
<div class="jumbotron container">
<a href="/dashboard/addProducts" class="btn btn-warning">Add Products</a>
  <h1 class="text-center mt-3 mb-3"> Products </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Code </th>
          <th scope="col">Product Description </th>
          <th scope="col">Product Category </th>
          <th scope="col">Product Price </th>
          <th scope="col">Product Quantity </th>
          <th scope="col">Product Status </th>
          <th scope="col">Product Images </th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($products as $product)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_code}}</td>
            <td>{{$product->product_description}}</td>
            <td>{{$product->category_name}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$product->product_quantity}}</td>
            @if($product->product_status==1)
              <td class="text-success">Active</td>
            @else
              <td class="text-danger">Inactive</td>
            @endif
            <td><a href="/dashboard/displayProductImages/{{$product->id}}" class="btn btn-success">Show Images</a></td>
            <td><a href="/dashboard/editProducts/{{$product->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/dashboard/deleteProducts/{{$product->id}}" cid="{{$product->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 