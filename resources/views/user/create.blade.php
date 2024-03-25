@extends('layouts.app')

@section('content')

@include('layouts.dashboard.header')
     
@include('layouts.dashboard.sidebar')

<div class="d-flex flex-column p-5 w-75">
    <hr class="sidebar-divder">
    <div class="card">
        <div class="card-header text-start">Create</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="name" class="form-label text-primary text-start d-block">Name</label>
                    <input id="user-name" class="form-control text-primary is-invalid" type="text" required>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="email" class="form-label text-primary text-start d-block">Email address</label>
                    <input id="user-email" class="form-control text-primary" type="email" required>
                </div>

                <div class="mt-5 col-lg-12 col-md-12 col-sm-12 text-center">
                    <button class="btn btn-danger btn-rounded" type="button"> cancel </button>
                    <button class="btn btn-primary btn-rounded" type="button" id="btn-create-user"> create </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.dashboard.footer')

@endsection