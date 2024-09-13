@extends('layouts.app-auth')

@section('title','Login User')

@section('name_content','Login User Account!')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address..." />
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
@endsection

@section('content_additional')
<div class="text-center">
    <a class="small" href="{{route('register')}}">Create an Account!</a>
</div>
@endsection
