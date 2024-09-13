@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Menu') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif        
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Merchant</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{ $menu->name }}</td>
                                    <td><a href="?merchant_id={{ $menu->merchant->id }}">{{ $menu->merchant->company_name }}</a></td>
                                    <td>{{ $menu->description }}</td>
                                    <td>Rp {{ $menu->price }}</td>
                                    <td>{{ $menu->menu_category ? $menu->menu_category : 'N/A' }}</td>
                                    <td>
                                        @if($menu->photo)
                                            <img src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    
                                    <td><button type="button" class="btn btn-success btn-sm">add to cart</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
