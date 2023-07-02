@extends('admin/template/main')

@section('content')

<h1>Tambah Produk</h1>

    <form action="{{route('produk.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name"> Nama Produk :</label>
                <input class="form-control" type="text" name="name" id="name"> 
        </div>

        <div class="form-group">
            <label for="price"> Price Produk :</label>
                <input class="form-control" type="number" name="price" id="harga">
            
        </div>

        <div class="form-group">
            <label for="description"> Description Produk :</label>
                <input class="form-control" type="text" name="description" id="description">
          
            </div>

            <input type="submit" name="submit" id="submit" class="btn btn-success">

        </form>

       


@endsection