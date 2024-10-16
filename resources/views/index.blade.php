@extends('layout')

@section('content')
    <div class="container">
        <h1>Daftar Baju</h1>
        <a href="{{ route('bajus.create') }}" class="btn btn-primary mb-3">Tambah Baju</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bajus as $baju)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $baju->nama }}</td>
                        <td>{{ $baju->ukuran }}</td>
                        <td>{{ $baju->harga }}</td>
                        <td>{{ $baju->stok }}</td>
                        <td>
                            <a href="{{ route('bajus.show', $baju->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('bajus.edit', $baju->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bajus.destroy', $baju->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
