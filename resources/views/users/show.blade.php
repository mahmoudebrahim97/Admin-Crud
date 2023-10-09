@extends('master')

@section('title')
Show User
@endsection

@section('content')

<div class="container d-flex justify-content-center" style="margin-top:70px;">
    <div class="row bg-light d-grid justify-content-center"  style="border-radius:20px; font-size: 20px; padding: 10px">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 mb-3">
            <div class="form-group">
                <strong>Username : </strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Email :</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
                <strong>Roles :</strong>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge bg-success">{{ $v }}</label>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center mt-4">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div   style="width: 100%">
                <a class="btn btn-success btn-lg"  style="width: 100%" href="{{ route('users.index') }}"> Back </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection
