@extends('master')
@section('content')
<div class="jumbotron container">
<a href="/dashboard/addConfigure" class="btn btn-warning">Add Configuration</a>
  <h1 class="text-center mt-3 mb-3">Configuration </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Admin Email</th>
          <th scope="col">Notification Email</th>
          <th scope="col">Contact No.</th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($configure as $data)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$data->admin_email}}</td>
            <td>{{$data->notification_email}}</td>
            <td>{{$data->contact_no}}</td>
            <td><a href="/dashboard/editConfigure/{{$data->id}}" class="btn btn-primary">Edit</a>
            </td></tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 