@extends('master')
@section('content')
<h1 class="text-center mt-3 mb-3" style="font-size:45px;">Product Images </h1>
<span class="ml-3"><a href="/dashboard/showProducts" class="btn btn-success ml-3">Back</a></span>
<div class="container p-3">
    @foreach($productimages as $images)
        @if($id == $images->product_id)
        <div class="card ml-3" style="width: 18rem;float:left;">
            <img src="{{asset('/uploads/'.$images->product_image)}}"  height=200 class="card-img-top" alt="no image">
            
            <div class="card-body">
                <a href="/dashboard/deleteProductImages/{{$images->id}}" cid="{{$images->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection
