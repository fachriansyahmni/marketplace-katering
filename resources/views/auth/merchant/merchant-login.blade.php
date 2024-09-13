@extends('layouts.app-auth')

@section('title','Login Merchant')

@section('name_content','Login to Merchant Account!')

@section('content')
<form method="POST" action="{{ route('merchant.login') }}">
    @csrf
    <div class="form-group">
        <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-user"
            id="inputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Merchant Address..." />
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user"
            id="inputPassword" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
@endsection

@section('content_additional')
<div class="text-center">
    <a class="small" href="{{route('merchant.register')}}">Create an Merchant Account!</a>
</div>
@endsection