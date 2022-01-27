@extends('master')
@section('content')
<div class="jumbotron container">
  <h1 class="text-center mt-3 mb-3">Contact Us Queries </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">User Name</th>
          <th scope="col">User Email</th>
          <th scope="col">User Contact No. </th>
          <th scope="col">User Message</th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($data as $d)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->contact}}</td>
            <td>{{$d->message}}</td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 