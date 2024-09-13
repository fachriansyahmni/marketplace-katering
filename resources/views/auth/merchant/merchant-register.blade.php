@extends('layouts.app-auth')

@section('title','Register Merchant')

@section('name_content','Create an Merchant Account!')

@section('content')
<form method="POST" action="{{ route('merchant.register') }}">
    @csrf
    <div class="form-group">
        <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control form-control-user" id="inputNameOfMerchant"
            placeholder="Merchant name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-user" id="inputEmail"
            placeholder="Email Merchant" required>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user"
                id="inputPassword" name="password" placeholder="Password" required>
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user"
                id="repeatPassword" name="password_confirmation" placeholder="Repeat Password" required>
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="address" value="{{old('address')}}" class="form-control form-control-user" id="inputAddress"
            placeholder="Address" required>
    </div>
    <div class="form-group">
        <input type="text" name="contact" value="{{old('contact')}}" class="form-control form-control-user" id="inputContact"
            placeholder="Contact" required>
    </div>
    <div class="form-group">
        <textarea name="description" class="form-control form-control-user" id="inputDescription"
            placeholder="Description (optional)" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
</form>
@endsection

@section('content_additional')
<div class="text-center">
    <a class="small" href="{{route('merchant.login')}}">Login to Merchant Account!</a>
</div>
@endsection