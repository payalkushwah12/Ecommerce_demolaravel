@extends('master')
@section('content')
<div class="jumbotron container">
<a href="/dashboard/addCms" class="btn btn-warning">Add Cms</a>
  <h1 class="text-center mt-3 mb-3">Cms </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($cmsdata as $data)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$data->title}}</td>
            <td>{{$data->content}}</td>
            <td><a href="/dashboard/editCms/{{$data->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/dashboard/deleteCms/{{$data->id}}" cid="{{$data->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 