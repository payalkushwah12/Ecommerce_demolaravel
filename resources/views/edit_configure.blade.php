@extends('master')
@section('content')

<div class="container jumbotron">
<a href="/dashboard/showConfigure" class="btn btn-warning">Back</a>
<h1 class="text-center mt-3" style="font-size:45px;">Edit Configuration</h1>
<form method="post" action="/dashboard/updateConfigure">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success text-success">{{Session::get('success')}}</div>
    @endif
        <div class="form-group">
          <label>Admin Email </label>
          <input type="email" class="form-control" name="admin_email" value="{{ $configure->admin_email}}"/>
          @if($errors->has('admin_email'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('admin_email')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>Email Notification</label>
          <input type="email" class="form-control" name="n_email" value="{{ $configure->notification_email}}"/>
          @if($errors->has('n_email'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('n_email')}}</span>
          @endif
        </div>
        <div class="form-group">
          <label>Contact No. </label>
          <input type="number" class="form-control" name="contact" value="{{ $configure->contact_no}}"/>
          @if($errors->has('contact'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('contact')}}</span>
          @endif
        </div>
        <input type="hidden" class="form-control" name="id" value="{{ $configure->id}}"/>
          
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
  
</div>
@endsection