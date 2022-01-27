@extends('master')
@section('content')
<div class="jumbotron container">
<a href="/dashboard/addCategory" class="btn btn-warning">Add Category</a>
  <h1 class="text-center mt-3 mb-3">Categories </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Category Name</th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($catdata as $data)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$data->category_name}}</td>
            <td><a href="/dashboard/editCategory/{{$data->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/dashboard/deleteCategory/{{$data->id}}" cid="{{$data->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 