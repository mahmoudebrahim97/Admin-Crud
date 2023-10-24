@extends('master')
@section('title')
    Users List
@endsection
@section('css')
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            <p class="font-bold ">{{ $message }}</p>
        </div>
    @endif

    <div class="container mt-5 d-flex justify-content-center">
        <div class="m-2">
            @can('create-user')
                <a class="btn btn-success p-1" href="{{ route('users.create') }}"> New User </a>
            @endcan
        </div>
        <div class="m-2">
            @can('mail-user')
                <a class="btn btn-info p-1" href="{{ route('mail_to_all_users') }}"> send Mail to all users</a>
            @endcan
        </div>
    </div>

    <div class="container" style="margin-top:20px">
        <section class="intro">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="table-responsive bg-white">
                                    <table class="table mb-0">
                                        <thead class="text-light" style="background-color: #1F2937">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Role</th>
                                                @can('operations-on-users')
                                                    <th width="280px">Operations</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody style=" color: black">
                                            @foreach ($data as $key => $user)
                                                <tr class="text-dark">
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->status == 'active')
                                                            <span class="label text-success d-flex"
                                                                style="font-size: 20px ; font-family: sans-serif">
                                                                <div class="dot-label bg-success ml-1"></div>
                                                                {{ $user->status }}
                                                            </span>
                                                        @else
                                                            <span class="label text-danger d-flex"
                                                                style="font-size: 15px;font-family: sans-serif">
                                                                <div class="dot-label bg-danger ml-1"></div>
                                                                {{ $user->status }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span>
                                                            {{ $user->country }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if (!empty($user->role_name))
                                                            @foreach ($user->role_name as $v)
                                                                <label class="badge bg-success">{{ $v }}</label>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    @can('operations-on-users')
                                                        <td>
                                                            <a class="btn btn-info m-1 mt-0 p-1"
                                                                href="{{ route('users.show', $user->id) }}">Show</a>
                                                            @can('edit-user')
                                                                <a class="btn btn-primary m-1 mt-0 p-1"
                                                                    href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                            @endcan
                                                            @can('delete-user')
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger m-1 mt-0 p-1']) !!}
                                                                {!! Form::close() !!}
                                                            @endcan
                                                            @can('mail-user')
                                                            <a class="btn btn-info m-1 mt-0 p-1" href="{{ route('mail', $user->id) }}">Send
                                                                Mail</a>
                                                            @endcan
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
@endsection
