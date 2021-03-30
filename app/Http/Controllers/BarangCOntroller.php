<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Barang = Barang::paginate(5);
        return view('barang.index', ['barang' => $Barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        Barang::create($request->all);
        return redirect()->route('barang.index')
        ->with('success', 'Barang Berhasil Ditambahkan');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Barang = Barang::find($id);
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Barang = Barang::find($id);
        return view('barang.index', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            ]);

         //fungsi eloquent untuk mengupdate data inputan kita
         Barang::find($id)->update($request->all());

         //jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect()->route('barang.index')->with('success', 'Barang Berhasil Diupdate');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        return redirect()->route('barang.index')
        -> with('success', 'Barang Berhasil Dihapus');
    }
    public function search(Request $request)
    {
        $Barang = Barang::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_barang', 'like', "%{$request->keyword}%")
                ->orWhere('id_barang', 'like', "%{$request->keyword}%")
                ->orWhere('kode_barang', 'like', "%{$request->keyword}%")
                ->orWhere('kode_barang', 'like', "%{$request->keyword}%");
        })->paginate(5);
        $Barang->appends($request->only('keyword'));
        return view('barang.index', compact('barang'));
    }
}
