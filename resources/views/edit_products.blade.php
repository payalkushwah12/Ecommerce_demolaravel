@extends('master')
@section('content')
<div class="container jumbotron">
<a href="/dashboard/showProducts" class="btn btn-warning">Back</a>
<h1 class="text-center mt-3" style="font-size:45px;">Edit Products</h1>
<form method="post" action="/dashboard/updateProducts" enctype="multipart/form-data">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif
    <div class="form-group">
          <label>Product Name </label>
          <input type="text" class="form-control" name="p_name" value="{{ $prodata->product_name}}"/>
          @if($errors->has('p_name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('p_name')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Product Description </label>
          <input type="text" class="form-control" name="p_description" value="{{ $prodata->product_description}}"/>
          @if($errors->has('p_description'))
          <div class="alert alert-danger">{{$errors->first('p_description')}}</div>
          @endif
      </div>
      <div class="form-group">
          <label>Product Category</label>
          <select class="form-control" name="p_category">
            <option value="{{ $prodata->category_id }}" selected> {{ $selcat }} </option>
            @foreach($catdata as $catname)
                @if($selcat != $catname)
                    <option value="{{$catname->id}}">{{$catname->category_name}}</option>
                @endif
            @endforeach
          </select>
            @if($errors->has('p_category')) <div class="alert alert-danger">{{$errors->first('p_category')}}</div>
          @endif
        </div>
        <div class="form-group">
          <label>Product Price </label>
          <input type="number" class="form-control" name="p_price" value="{{ $proattr->product_price}}"/>
          @if($errors->has('p_price'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('p_price')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Product Quantity </label>
          <input type="number" class="form-control" name="p_quantity" value="{{ $proattr->product_quantity}}"/>
          @if($errors->has('p_quantity'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('p_quantity')}}</span>
          @endif
      </div>
        <div class="form-group">
          <label>Product Images </label>
          <input type="file" class="form-contol" name="images[]" multiple/>
        </div>
        <div class="form-group">
            <label>Status </label><br>
            &nbsp;<input type="radio" name="p_status" id="active" value="1" checked>
            <label for="active">Active</label>&nbsp;&nbsp;
            <input type="radio" name="p_status" id="inactive" value="0">
            <label for="inactive">Inactive</label>
        </div>
        <input type="hidden" class="form-control" name="id" value="{{ $prodata->id }}"/>
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection