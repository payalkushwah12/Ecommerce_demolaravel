@extends('master')
@section('content')

<div class="container jumbotron">
<a href="/dashboard/showCategory" class="btn btn-warning">Back</a>
<h1 class="text-center mt-3" style="font-size:45px;">Edit Category</h1>
<form method="post" action="/dashboard/updateCategory">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success text-success">{{Session::get('success')}}</div>
    @endif
        <div class="form-group">
          <label>Category Name </label>
          <input type="text" class="form-control" name="category_name" value="{{ $category->category_name}}"/>
          @if($errors->has('category_name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('category_name')}}</span>
          @endif
      </div>
      <input type="hidden" class="form-control" name="id" value="{{ $category->id}}"/>
          
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection