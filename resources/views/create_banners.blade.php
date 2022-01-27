@extends('master')
@section('content')

<div class="container jumbotron">
<a href="/dashboard/showBanners" class="btn btn-warning">Show Banners</a>
<h1 class="text-center mt-3" style="font-size:45px;">Add Banners</h1>
<form method="post" action="/dashboard/postaddBanners" enctype="multipart/form-data">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success text-success">{{Session::get('success')}}</div>
    @endif
        <div class="form-group">
          <label>Banner Title</label>
          <input type="text" class="form-control" name="b_title" />
          @if($errors->has('b_title'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('b_title')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Banner Description </label>
          <input type="text" class="form-control" name="b_description" />
          @if($errors->has('b_description'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('b_description')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Banner Image </label>
          <input type="file" class="form-contol" name="images[]" multiple/>
        </div>
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection