@extends('master')
@section('content')
<div class="jumbotron container">
<a href="/dashboard/addCoupons" class="btn btn-warning">Add Coupons</a>
  <h1 class="text-center mt-3 mb-3">Coupons </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Coupon Code</th>
          <th scope="col">Coupon Discount</th>
          <th scope="col">Coupon Status</th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($coupons as $data)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$data->coupon_code}}</td>
            <td>{{$data->coupon_discount}}</td>
            @if($data->coupon_status==1)
              <td class="text-success">Active</td>
            @else
              <td class="text-danger">Inactive</td>
            @endif
            <td><a href="/dashboard/editCoupons/{{$data->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/dashboard/deleteCoupons/{{$data->id}}" cid="{{$data->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 