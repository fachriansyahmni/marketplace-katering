@extends('layouts.master-merchant')

@section('content')

<a href="{{route('menu.index')}}">back to menu management</a>
<h1>Edit Menu</h1>
<form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $menu->name) }}" class="form-control" id="name" required>
    </div>
    
    <div class="form-group">
        <label>Type Menu</label>
        <input type="text" value="food" class="form-control" disabled>
    </div>
    
    <div class="form-group">
        <label for="menu_category">Category Menu</label>
        <select class="form-control" name="menu_category">
            <option value="buah" {{ $menu->menu_category == 'buah' ? 'selected' : '' }}>buah-buahan</option>
            <option value="sayuran" {{ $menu->menu_category == 'sayuran' ? 'selected' : '' }}>sayuran</option>
            <option value="lainnya" {{ $menu->menu_category == 'lainnya' ? 'selected' : '' }}>lainnya</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description">{{ old('description', $menu->description) }}</textarea>
    </div>
    
    <div class="form-group">
        <label for="price">Price</label> (Rupiah)
        <input type="number" name="price" value="{{ old('price', $menu->price) }}" class="form-control" id="price" required>
    </div>
    
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control-file" id="image">
        @if($menu->image)
            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" style="width: 100px; margin-top: 10px;">
        @endif
    </div>
    
    <button type="submit" class="btn btn-primary">Update Menu</button>
</form>
@endsection