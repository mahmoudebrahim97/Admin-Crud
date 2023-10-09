@extends('master')

@section('title')
sub categories
@endsection

@section('content')
    <div class="container d-flex justify-content-center" style="margin-top: 30px">
        @can('product-create')
            <a class="btn btn-success m-3" href="{{ route('create', $id) }}"> Create New Product</a>
        @endcan
    </div>
    <div class="container" style="margin-top:50px">
        <div class="row" style="height:auto; display: flex; flex-wrap: wrap">
            @foreach ($rows as $child)
                <div class="col-4 ">
                    <a href="{{ route('subcategories', $child->id) }}" style="text-decoration: none ; color: black">
                        <div class="card" style="width: auto;">
                            <img src="{{ $child->image ? asset('categories/' . $child->img_path . '/' . $child->image) : '' }}"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $child->name }}</h5>
                                <p class="card-text">{{ $child->detail }}</p>
                                <form action="{{route('destroy',$child->id)}}" method="POST">
                                    <div class="row p-1">
                                        @csrf
                                        @can('product-edit')
                                            <a class="btn btn-primary mb-1" style="padding:1px" href="{{route('edit',$child->id)}}">Edit</a>
                                        @endcan
                                        @method('DELETE')
                                        @can('product-list')
                                        <a href="" class="btn btn-success mb-1" style="padding:1px">Models</a>
                                        @endcan
                                        @can('product-delete')
                                            <button type="submit" class="btn btn-danger mb-1"
                                                style="padding:1px">Delete</button>
                                        @endcan
                                    </div>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
