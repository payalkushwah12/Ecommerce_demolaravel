@extends('master')
@section('content')

<div class="container jumbotron">
<a href="/dashboard/showUserOrders" class="btn btn-warning">Back</a>
<h1 class="text-center mt-3" style="font-size:45px;">Edit Order Status</h1>
<form method="post" action="/dashboard/updateOrderStatus">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success text-success">{{Session::get('success')}}</div>
    @endif
        <div class="form-group">
          <label>Order status </label>
          <input type="text" class="form-control" name="o_status" value="{{ $order->order_status}}"/>
          @if($errors->has('o_status'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('o_status')}}</span>
          @endif
      </div>
      <input type="hidden" class="form-control" name="id" value="{{ $order->id}}"/>
          
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection