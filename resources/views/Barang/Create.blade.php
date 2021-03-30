@extends('layout')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah barang
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('barang.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                        <div class="form-group">
                            <label for="Nama Barang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="Nama Barang" aria-describedby="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="Kategori">Kategori</label>
                            <select name="kategori_barang" id="Kategori" class="form-control">
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Snack">Snack</option>
                                <option value="Es Krim">Es Krim</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="harga" name="harga" class="form-control" id="harga"
                                 aria-describedby="harga">
                        </div>
                        <div class="form-group">
                            <label for="qty">qty</label>
                            <input type="qty" name="qty" class="form-control" id="qty"
                                 aria-describedby="qty">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection