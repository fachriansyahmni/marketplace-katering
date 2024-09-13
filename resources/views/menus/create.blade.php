@extends('layouts.master-merchant')

@section('content')

<a href="{{route('menu.index')}}">back to management</a>
<h1>Add New Menu</h1>
<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" required>
    </div>
    <div class="form-group">
        <label>Type Menu</label>
        <input type="text" value="food" class="form-control" disabled>
    </div>
    <div class="form-group">
        <label for="name">Category Menu</label>
        <select class="form-control" name="menu_category">
            <option value="buah">buah-buahan</option>
            <option value="sayuran">sayuran</option>
            <option value="lainnya">lainnya</option>
        </select>
        
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label> (Rupiah)
        <input type="number" name="price" value={{old('price',1)}} class="form-control" id="price" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control-file" id="image">
    </div>
    <button type="submit" class="btn btn-primary">Add Menu</button>
</form>
@endsection