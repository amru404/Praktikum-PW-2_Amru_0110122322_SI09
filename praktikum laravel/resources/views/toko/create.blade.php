@extends('template/admin/index')

@section('content')

<h2>FORM INPUT PRODUK</h2>

<form action="{{ route('produk.store') }}" method="POST">
    @csrf
    <div class = "form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" value="" class="form-control">
    </div>

    <div class = "form-group">
        <label for="price">Harga Produk</label>
        <input type="number" name="price" id="price" value="" class="form-control">
    </div>

    <div class = "form-group">
        <label for="description">Deskripsi Produk</label>
        <input type="text" name="description" id="description" value="" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Add</button>
</form>


@endsection

