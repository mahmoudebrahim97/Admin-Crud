@extends('master')

@section('title')
    Create Role
@endsection

@section('css')
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container mb-2">
        @if (count($errors) > 0)
            <div class="alert alert-danger d-flex justify-content-center">
                <strong>OPPS!</strong> There is a problem in the input field <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container" style="margin-top: 30px;">
        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>role name : </strong>
                    <br>
                    <br>
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                <div class="form-group">
                    <strong>roles : </strong>
                    <br />
                    <hr />
                    @foreach ($permission as $value)
                        <label
                            style="font-size: 16px; font-family: Verdana, Geneva, Tahoma, sans-serif d-grid; width:50%;">{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary ml-2">Create</button>
                <a class="btn btn-outline-primary mr-2 " href="{{ route('roles.index') }}">Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
