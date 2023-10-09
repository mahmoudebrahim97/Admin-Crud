@extends('master')

@section('title')
    Roles
@endsection

@section('css')
@endsection

@section('content')
    <div class="container d-flex justify-content-center" style="margin-top:10px ">
        @if ($message = Session::get('success'))
            <div class="alert alert-success pt-2 font-bold d-flex justify-content-center align-items-center">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

    <div class="row mb-2 mt-5 ">
        <div class="col-lg-12 margin-tb d-flex justify-content-center">
            <div>
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}">Add New Role</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:20px;">
        <section class="intro">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="table-responsive bg-white">
                                    <table class="table mb-0">
                                        <thead class="text-light" style="background-color: #1F2937;">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                @can('operations-on-roles')
                                                    <th width="280px">Operations</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td><span class="badge bg-success">{{ $role->name }}</span></td>
                                                    @can('operations-on-roles')
                                                        <td>
                                                            @can('show-role')
                                                                <a class="btn btn-info m-1 mt-0 p-1"
                                                                    href="{{ route('roles.show', $role->id) }}">Show</a>
                                                            @endcan
                                                            @can('role-edit')
                                                                <a class="btn btn-primary m-1 mt-0 p-1"
                                                                    href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                                            @endcan
                                                            @can('role-delete')
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger m-1 mt-0 p-1']) !!}
                                                                {!! Form::close() !!}
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
