@extends('master')
@section('content')
<div class="jumbotron container">
<a href="/dashboard/addUsers" class="btn btn-warning">Add Users</a>
  <h1 class="text-center mt-3 mb-3"> Users </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name </th>
          <th scope="col">Email </th>
          <th scope="col">Role </th>
          <th scope="col">Status </th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($users as $user)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role_name}}</td>
            @if($user->status==1)
              <td class="text-success">Active</td>
            @else
              <td class="text-danger">Inactive</td>
            @endif
            <td><a href="/dashboard/editUsers/{{$user->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/dashboard/deleteUsers/{{$user->id}}" cid="{{$user->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 