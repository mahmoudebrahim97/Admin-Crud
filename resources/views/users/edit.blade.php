@extends('master')

@section('title')
    Edit User
@endsection

@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@stop


@section('content')
    <!-- row -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>OPPS</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container"  style="margin-top: 25px;">
        <div class="row" >
            <div class="col-lg-12 col-md-12">
                <div class="card"  style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="col-lg-12 margin-tb">
                        </div><br>
                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                        <div class="">
                            <div class="row mg-b-20 mb-2">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>Username <span class="tx-danger">*</span></label>
                                    {!! Form::text('name', null, ['class' => 'form-control mt-2', 'required']) !!}
                                </div>
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>Email<span class="tx-danger">*</span></label>
                                    {!! Form::text('email', null, ['class' => 'form-control mt-2', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row mg-b-20 mb-2">
                            <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="mb-2"> Password <span class="tx-danger">*</span></label>
                                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="row mg-b-20 mb-2">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label"> Status *</label>
                                <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                    <option value="{{ $user->status }}">{{ $user->status }}</option>
                                    <option value="active">active</option>
                                    <option value="blocked">blocked</option>
                                </select>
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                                <strong class="form-label">Country</strong>
                                {!! Form::text('country', null, ['placeholder' => 'Your Country', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                                <div class="form-group">
                                    <strong> Role Name :</strong>
                                    {!! Form::select('role_name[]', $roles, $userRole, ['class' => 'form-control mt-2', 'multiple']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="mg-t-30 d-flex justify-content-center">
                            <button class="btn btn-success btn-lg m-3 pd-x-20" type="submit">Update</button>
                            <a class="btn btn-outline-success btn-lg m-3" href="{{ route('users.index') }}">Back</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
