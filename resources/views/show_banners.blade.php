@extends('master')
@section('content')
<div class="container jumbotron">
<a href="/dashboard/addBanners" class="btn btn-warning">Add Banners</a>
  <h1 class="text-center mt-3 mb-3"> Banners </h1>
  <table class="table table-bordered table-hover">
  <thead class="thead-dark">
      <tr>
          <th scope="col">S.no</th>
          <th scope="col">Banner Title</th>
          <th scope="col">Banner Description </th>
          <th scope="col">Banner Image </th>
          <th scope="col"> Actions </th>
      </tr>
  </thead>
      @php 
       $sn=1;
      @endphp
      @foreach($banners as $banner)
        <tr>
            <td>{{$sn}}</td>
            <td>{{$banner->banner_title}}</td>
            <td>{{$banner->banner_description}}</td>
            <td><img src="{{asset('/uploads/'.$banner->banner_image)}}" width=100 height=100 /></td>
            <td><a href="/dashboard/editBanners/{{$banner->id}}" class="btn btn-primary">Edit</a>&nbsp;
                <a href="/dashboard/deleteBanners/{{$banner->id}}" cid="{{$banner->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
        </tr>
      @php 
       $sn++;
      @endphp
      @endforeach
  </table>
</div>
@endsection 