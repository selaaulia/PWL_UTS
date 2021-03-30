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
        $barangs = Barang::paginate(5);
        return view('barang.index', ['barang' => $barangs]);
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
        $request->request->add([
            'kode_barang' => 'PRD' . str_pad(Barang::max('id_barang') + 1, 3, '0', STR_PAD_LEFT)
        ]);

        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        Barang::create($request->all());
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
        $barangs = Barang::find($id);
        return view('barang.detail', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::find($id);
        return view('barang.edit', compact('barangs'));
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
        $barangs = Barang::where([
            ['kode_barang', '!=', null, 'OR', 'nama_barang', '!=', null, 'OR', 'kategori_barang', '!=', null],
            [function ($query) use ($request){
                if (($keyword = $request->keyword)) {
                    $query  ->orWhere('kode_barang', 'like', "%{$keyword}%")
                            ->orWhere('nama_barang', 'like', "%{$keyword}%")
                            ->orWhere('kategori_barang', 'like', "%{$keyword}%");
                }
            }]
        ])
        ->orderBy('id_barang')
        ->paginate(5);
    
        return view('barang.index', compact('barangs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
