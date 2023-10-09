@extends('master')

@section('title')
Show Role
@endsection

@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />

@section('content')

<div class="container mt-4" >
    <div class="row" >
        <div class="col-md-12">
            <div class="card mg-b-20" style="border-radius: 20px">
                <div class="card-body" >
                    <div class="main-content-label mg-b-5">
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul id="treeview1">
                                <li> <h2 class="badge bg-success p-2">{{ $role->name }}</h2>
                                    <ul>
                                        @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                        <li>{{ $v->name }}</li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<div class="container d-flex justify-content-center mt-3">
    <a class="btn btn-outline-success btn-lg mb-1" href="{{ route('roles.index') }}">Back</a>
</div>
@endsection

@section('js')
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection
