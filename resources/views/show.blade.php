@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $baju->nama }}</h1>
        <p>Ukuran: {{ $baju->ukuran }}</p>
        <p>Harga: Rp{{ $baju->harga }}</p>
        <p>Stok: {{ $baju->stok }}</p>
        <a href="{{ route('bajus.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
    </div>
@endsection
