{{-- @dd($id) --}}
@extends('master')
@section('title')
    Create Product
@endsection
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger d-flex justify-content-center mt-2 border-9 ">
            <ul class="w-auto">
                <li><strong>Whoops!</strong> There were some problems with your input.</li>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

    <div class="container" style="margin-top: 40px">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-1">
                                <strong>Name</strong>
                            </div>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-1">
                            <strong>description</strong>
                        </div>
                        <div class="col-9">
                            <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="div">
                <input type="hidden" name="category_id" value="{{$id}}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-1">
                            <strong>image</strong>
                        </div>
                        <div class="col-9">
                            <p class="text-danger">* jpeg , gif , png </p>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="image"
                                accept="image/png, image/gif, image/jpeg">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a class="btn btn-outline-success" href="{{ route('category') }}"> Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

