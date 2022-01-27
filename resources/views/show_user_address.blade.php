@extends('master')
@section('content')
<div class="jumbotron container">
<h1 class="text-center mt-3 mb-3"> User Address </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">User id</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Address</th>
          <th scope="col">Postal Code</th>
          <th scope="col">Contact No.</th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($userdata as $data)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$data->user_id}}</td>
            <td>{{$data->first_name}}</td>
            <td>{{$data->last_name}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->postal}}</td>
            <td>{{$data->contact}}</td>
            </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 