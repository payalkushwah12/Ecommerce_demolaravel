@extends('master')
@section('content')
<div class="container jumbotron">
<a href="/dashboard/showUsers" class="btn btn-warning">Back</a>
<h1 class="text-center mt-3" style="font-size:45px;">Edit Users</h1>
<form method="post" action="/dashboard/updateUsers" enctype="multipart/form-data">
   @csrf()    
   @if(Session::has('errMsg'))
    <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success  text-success">{{Session::get('success')}}</div>
    @endif
    <div class="form-group">
          <label>First Name </label>
          <input type="text" class="form-control" name="f_name" value="{{ $users->first_name }}"/>
          @if($errors->has('f_name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('f_name')}}</span>
          @endif
    </div>
    <div class="form-group">
          <label>Last Name </label>
          <input type="text" class="form-control" name="l_name" value="{{ $users->last_name }}"/>
          @if($errors->has('l_name'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('l_name')}}</span>
          @endif
    </div>
    <div class="form-group">
          <label>Email </label>
          <input type="text" class="form-control" name="email" value="{{ $users->email }}"/>
          @if($errors->has('email'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('email')}}</span>
          @endif
    </div>
    <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" />
          @if($errors->has('password'))
          <br><span class="alert alert-danger" role="alert">{{$errors->first('password')}}</span>
          @endif
    </div>
      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role">
            <option value="5" Selected> Customer </option>
            @foreach($roles as $r)
              <option value="{{$r->id}}">{{$r->role_name}}</option>
            @endforeach
          </select>
            @if($errors->has('role')) <div class="alert alert-danger">{{$errors->first('role')}}</div>
          @endif
        </div>
        <div class="form-group">
            <label>Status </label><br>
            &nbsp;<input type="radio" name="status" id="active" value="1" checked>
            <label for="active">Active</label>&nbsp;&nbsp;
            <input type="radio" name="status" id="inactive" value="0">
            <label for="inactive">Inactive</label>
        </div>

        <input type="hidden" class="form-control" name="id" value="{{ $users->id }}"/>
      <input type="submit" value="Submit" class="btn btn-success"/>
  </form>
</div>
@endsection