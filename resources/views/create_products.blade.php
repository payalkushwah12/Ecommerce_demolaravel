@extends('master')
@section('content')
<div class="container jumbotron">
<a href="/dashboard/showProducts" class="btn btn-warning">Show Products</a>
<h1 class="text-center mt-3" style="font-size:45px;">Add Products</h1>
<form method="post" action="/dashboard/postaddProducts" enctype="multipart/form-data">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif
    <div class="form-group">
          <label>Product Name </label>
          <input type="text" class="form-control" name="p_name" />
          @if($errors->has('p_name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('p_name')}}</span>
          @endif
      </div>
      @php
        function unique_code($limit)
          {
            return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
          }
      @endphp
      <div class="form-group">
          <label>Product Code </label>
          <input id="code" type="text" class="form-control " name="p_code" value="@php echo unique_code(16); @endphp" readonly>  
          @if($errors->has('p_code'))
          <div class="alert alert-danger">{{$errors->first('p_code')}}</div>
          @endif
      </div>
      <div class="form-group">
          <label>Product Description </label>
          <input type="text" class="form-control" name="p_description" />
          @if($errors->has('p_description'))
          <div class="alert alert-danger">{{$errors->first('p_description')}}</div>
          @endif
      </div>
      <div class="form-group">
          <label>Product Category</label>
          <select class="form-control" name="p_category">
            <option value=""> Select </option>
            @foreach($catdata as $catname)
              <option value="{{$catname->id}}">{{$catname->category_name}}</option>
            @endforeach
          </select>
            @if($errors->has('p_category')) <div class="alert alert-danger">{{$errors->first('p_category')}}</div>
          @endif
        </div>
        <div class="form-group">
          <label>Product Price </label>
          <input type="number" class="form-control" name="p_price" />
          @if($errors->has('p_price'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('p_price')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Product Quantity </label>
          <input type="number" class="form-control" name="p_quantity" />
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

      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection