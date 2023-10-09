@extends('master')
@section('title')
Edit {{$row->name}}
@endsection
@section('content')
<div class="container">
    <div class="row text-center w-100">
        <div class="col-lg-12 margin-tb w-100" style="margin-top: 30px">>
            <div class="pull-left mb-2 w-100">
                <h3 class="w-100">Edit {{$row->name}}</h3>
            </div>,<br>
        </div>
    </div>
</div>
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
    <div class="container">
        <form action="{{route('update',$row->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $row->name }}" class="form-control"
                            placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $row->description }}</textarea>
                    </div>
                    @if ($row->category_id !=null)
                    <div class="div">
                        <input type="hidden" name="category_id" value="{{$row->id}}">
                    </div>
                    @endif
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                        <img src="{{ $row->image? asset('categories/' . $row->img_path . '/' . $row->image) : ''}}" alt="Current Image" class="img-thumbnail">
                    </div>
                    <br>
                    <div class="col-9">
                        <p class="text-danger">* jpeg , gif , png </p>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="image"
                            accept="image/png, image/gif, image/jpeg" value="{{$row->image}}">
                            <label class="input-group-text" for="inputGroupFile02">Update Picture</label>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success btn-lg">Update</button>
                    <a class="btn btn-outline-success" href="{{route('category',$row->id)}}">Back</a>
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>
@endsection
