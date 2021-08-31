@extends('layouts.app')

@section('content')

<div class="content-page">
    @include('templates.content_header')
    <div class="content-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
            <h4 class="content-title content-title-xs">Profile</h4>
        </div>
    </div><!-- content-header -->
    <div class="content-body">
        <div class="component no-code">
            <div class="card rounded-5">
                <div class="card-body">
                    <div class="component">
                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible mg-b-0 fade show" role="alert">
                            <i class="icon fa fa-close"></i> {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><br>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-warning alert-dismissible mg-b-0 fade show" role="alert">
                            <i class="icon fa fa-close"></i> {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><br>
                        @endif
                        <form method="POST" action="{{ url('profile/update', $profile->id) }}">
                            @csrf
                            <div class="row row-sm">

                                <div class="col-sm-2">
                                    <label class="form-label">Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ $profile->name }}" required="">
                                </div><br><br><br>
                                <div class="col-sm-2">
                                    <label class="form-label">Email</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{ $profile->email }}" placeholder="Enter your email" disabled="">
                                </div><br><br><br>
                                <div class="col-sm-2">
                                    <label class="form-label">Password</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required="">
                                </div><br><br><br>
                                <div class="col-sm-2">
                                    <label class="form-label">Confirm Password</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirm" placeholder="Enter your password confirmation" name="telp" required="">
                                </div><br><br><br>
                                <div class="col-sm-2">
                                    <label class="form-label"></label>
                                </div>
                                <div class="col-sm-10" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ url('/') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                </div><br><br><br>
                            </div><!-- row -->
                        </form>
                    </div><!-- component-section -->
                </div>
            </div>
        </div>
    </div>
</div><!-- content-body -->
</div><!-- content -->

@endsection