{{-- @dd($user) --}}
@extends('master')

@section('title')
    Send Mail To All Users
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
        <form action="{{ route('send_mail_all_users') }}" method="POST">
            @csrf
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
