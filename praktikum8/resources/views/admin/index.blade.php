@extends('admin/template/main')

@section('content')
<h1>Table Produk</h1>

<a href="{{route('produk.create')}}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Nomer</th>
            <th scope="col">nama</th>
            <th scope="col">Harga</th>
            <th scope="col">deskripsi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
            $number = 1    
            @endphp
        @foreach ($produk as $data)
        <tr>
            <td>{{ $number}}</td>
            <td>{{ $data->name}}</td>
            <td>{{ $data->price}}</td>
            <td>{{ $data->description}}</td>
            <td>  <a href="{{ route('produk.edit', $data) }}" class="btn btn-primary">Edit</a>
              <form action="{{ route('produk.destroy', $data) }}" method="POST" style="display: inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Delete</button>
              </form></td>
        </tr>
        @php
            $number++;
        @endphp
        @endforeach  
        </tbody>
      </table>
@endsection