@extends('master')

@section('title')
    Create New Member
@endsection

@section('css')
@endsection

@section('content')
    <div class="container d-flex justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger text-center">
                <strong>OPPS !</strong> There is a problem on the input field <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container" style="margin-top:50px;">
        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        <div class="row d-flex justify-content-center mb-2">
            <div class="col-5">
                <div class="form-group">
                    <strong> Name :</strong>
                    <br>
                    {!! Form::text('name', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <strong>Email :</strong>
                    {!! Form::text('email', null, ['placeholder' => 'Your Email', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mb-2">
            <div class="col-5">
                <div class="form-group">
                    <strong> Password :</strong>
                    <br>
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-5">
                <div class="form-group">
                    <strong> Confirm Your Passowrd :</strong>
                    <br>
                    {!! Form::password('confirm-password', ['placeholder' => 'Retype the password', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="row row-sm mg-b-20 d-flex justify-content-center mb-2">
            <div class="col-5">
                <strong class="form-label">Status</strong>
                <select name="status" id="select-beast" class="form-control  nice-select">
                    <option value="active">active</option>
                    <option value="blocked">blocked</option>
                </select>
            </div>
            <div class="col-5">
                <strong class="form-label">Country</strong>
                {!! Form::text('country', null, ['placeholder' => 'Your Country', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row d-flex justify-content-center mb-2">
            <div class="col-10 pr-0">
                <div class="form-group">
                    <strong>Role Name :</strong>
                    <br>
                    {!! Form::select('role_name[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mb-2">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success btn-lg m-1">Create</button>
                <a class="btn btn-outline-success m-5 btn-lg" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
        {!! Form::close() !!}>
    </div>
@endsection

@section('js')
@endsection
