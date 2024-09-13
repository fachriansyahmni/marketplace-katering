@extends('layouts.master-merchant')

@section('content')
<h1>Edit Merchant Profile</h1>
<form method="POST" action="{{ route('merchant.update') }}">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <label for="company_name" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

        <div class="col-md-6">
            <input id="company_name" name="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="name" value="{{ old('Company Name',$merchant->company_name) }}" required autocomplete="company_name" autofocus>

            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" name="address" class="form-control @error('address') is-invalid @enderror" name="name" value="{{ old('Company Name',$merchant->address) }}" required autocomplete="address" autofocus>

            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('contact') }}</label>

        <div class="col-md-6">
            <input id="contact" type="number" name="contact" class="form-control @error('contact') is-invalid @enderror" name="name" value="{{ old('Company Name',$merchant->contact) }}" required autocomplete="contact" autofocus>

            @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

        <div class="col-md-6">
            <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" name="name" value="{{ old('Company Name',$merchant->description) }}" required autocomplete="description" autofocus>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update Data') }}
            </button>
        </div>
    </div>
</form>
@endsection