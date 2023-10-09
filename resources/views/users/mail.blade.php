{{-- @dd($user) --}}
@extends('master')

@section('title')
    send mail to {{ $user->name }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="container" style="margin-top: 60px;">
        @if (Session::has('sent successfully'))
            <div class="alert alert-success text-center">
                {{ Session::get('sent successfully') }}
            </div>
        @endif
        <form action="{{ route('send_mail') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="staticName" class="col-sm-2 col-form-label">Name : </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" placeholder="{{ $user->name }}"
                        value="{{ $user->name }}" name="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email : </label>
                <div class="col-sm-10">
                    <input type="text" placeholder="{{ $user->email }}" class="form-control-plaintext" id="staticEmail"
                        value="{{ $user->email }}" readonly name="email">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message : </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <a><button class="btn btn-success btn-lg m-2">Send</button></a>
                <a class="btn btn-outline-success btn-lg m-2" href="{{ route('userIndex') }}">Back</a>
            </div>
        </form>
    </div>
@endsection
