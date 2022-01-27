@extends('master')
@section('content')

<div class="container jumbotron">
<a href="/dashboard/showCms" class="btn btn-warning">Show Cms</a>
<h1 class="text-center mt-3" style="font-size:45px;">Add Cms</h1>
<form method="post" action="/dashboard/postaddCms">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success text-success">{{Session::get('success')}}</div>
    @endif
        <div class="form-group">
          <label>Title </label>
          <input type="text" class="form-control" name="title" />
          @if($errors->has('title'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('title')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Content </label>
          <textarea class="form-control" name="content" rows="4"></textarea>
          @if($errors->has('content'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('content')}}</span>
          @endif
      </div>
      
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection