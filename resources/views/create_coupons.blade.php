@extends('master')
@section('content')
<div class="container jumbotron">
<a href="/dashboard/showCoupons" class="btn btn-warning">Show Coupons</a>
<h1 class="text-center mt-3" style="font-size:45px;">Coupons</h1>
<form method="post" action="/dashboard/postaddCoupons" enctype="multipart/form-data">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif
    <div class="form-group">
          <label>Coupon Code </label>
          <input type="text" class="form-control" name="coupon_code" placeholder="Enter Coupon Code"/>
          @if($errors->has('coupon_code'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('coupon_code')}}</span>
          @endif
      </div>
        <div class="form-group">
          <label>Coupon Discount </label>
          <input type="number" class="form-control" name="c_discount" placeholder="Enter Discount percent value"/>
          @if($errors->has('c_discount'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('c_discount')}}</span>
          @endif
      </div>
        <div class="form-group">
            <label>Coupon Status </label><br>
            &nbsp;<input type="radio" name="c_status" id="active" value="1" checked>
            <label for="active">Active</label>&nbsp;&nbsp;
            <input type="radio" name="c_status" id="inactive" value="0">
            <label for="inactive">Inactive</label>
        </div>

      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection