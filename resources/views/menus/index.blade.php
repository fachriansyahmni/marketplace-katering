@extends('layouts.master-merchant')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Management Menu</h6>

            <div class="">
                <a class="btn btn-success" href="{{route('menus.create')}}">add menu</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($menus as $menu)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $menu->name }}</td>
                            <td><img src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" width="200px" /></td>
                            <td>{{ $menu->description }}</td>
                            <td>Rp {{ $menu->price }}</td>
                            <td>
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection