@extends('master')
@section('content')

<div class="container jumbotron">
<a href="/dashboard/showCms" class="btn btn-warning">Back</a>
<h1 class="text-center mt-3" style="font-size:45px;">Edit Cms</h1>
<form method="post" action="/dashboard/postupdateCms">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success text-success">{{Session::get('success')}}</div>
    @endif
        <div class="form-group">
          <label>Title </label>
          <input type="text" class="form-control" name="title" value="{{ $cms->title}}"/>
          @if($errors->has('title'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('title')}}</span>
          @endif
      </div>
      <div class="form-group">
          <label>Content </label>
          <textarea class="form-control" name="content" rows="4" value="{{ $cms->content}}"></textarea>
          @if($errors->has('content'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('content')}}</span>
          @endif
      </div>
      <input type="hidden" class="form-control" name="id" value="{{ $cms->id}}"/>
          
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection