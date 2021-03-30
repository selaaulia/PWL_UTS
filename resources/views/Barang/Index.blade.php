@extends("layout")
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>TOKO SERBA ADA</h2>
            </div>
            <div class="float-left my-4">
                <form action="/barang/cari/" method="GET">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Search users...">
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('barang.create') }}"> Input Barang</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id_barang</th>
                <th>kode_barang</th>
                <th>nama_barang</th>
                <th>kategori_barang</th>
                <th>harga</th>
                <th>qty</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $Barang)
                <tr>
                    <td>{{ $Barang->id_barang }}</td>
                    <td>{{ $Barang->kode_barang }}</td>
                    <td>{{ $Barang->nama_barang }}</td>
                    <td>{{ $Barang->kategori_barang }}</td>
                    <td>{{ $Barang->harga }}</td>
                    <td>{{ $Barang->qty }}</td>
                    <td>
                        <form action="{{ route('barang.destroy', $Barang->id_barang) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('barang.show', $Barang->id_barang) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('barang.edit', $Barang->id_barang) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {{ $barang->links() }}
    </div>
@endsection