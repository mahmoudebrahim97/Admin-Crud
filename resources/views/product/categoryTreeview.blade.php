@extends('master')
@section('title')
    Products
@endsection
@section('content')
    <div class="container d-flex justify-content-center" style="margin-top: 30px">
        @can('product-create')
            <a class="btn btn-success" href="{{ route('createMain') }}"> Create New Product</a>
        @endcan
    </div>
    <div class="container mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex justify-content-center align-items-center font-bold">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="container" style="margin-top:50px">
        <div class="row" style="height:auto; display: flex; flex-wrap: wrap">
            <?php $rows = App\Models\Category::where('category_id', null)->get(); ?>
            @foreach ($rows as $category)
                <div class="col-4 ">
                    <a href="{{ route('subcategories', $category->id) }}" style="text-decoration: none ; color: black">
                        <div class="card" style="width: auto;">
                            <img src="{{ $category->image ? asset('categories/' . '/' . $category->image) : '' }}"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text">{{ $category->description }}</p>
                                <form action="{{ route('destroy', $category->id) }}" method="POST">
                                <div class="row p-1">
                                        @method('DELETE')
                                        @csrf
                                        @can('product-edit')
                                            <a class="btn btn-primary mb-1" style="padding:1px" href="{{route('edit',$category->id)}}">Edit</a>
                                        @endcan
                                        @can('product-delete')
                                            <button class="btn btn-danger mb-1"
                                                    style="padding:1px" type="submit">Delete</button>
                                        @endcan
                                    </div>
                                </form>
                            </div>
                        </div>
                    </a>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
