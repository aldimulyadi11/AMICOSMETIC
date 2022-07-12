<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index()
    {
        $produk=DB::table('produks')->get();
        $supplier=DB::table('suppliers')->get();
        $kategori = DB::table('kategoris')->get();
        return view('produk.index',compact('produk','supplier','kategori'));
    }

    
    public function barcode(Request $request)
    { 
        $jumlah = $request->number;
        $ukuran = $request->ukuran;
        $kode = $request->kode_produk;
        $pdf = PDF::loadview('produk.barcode',compact('jumlah','ukuran','kode'));
        return $pdf->stream();
        //return view('produk.barcode',compact('jumlah','ukuran','kode'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $produk = DB::table('produks')->where('id',$id)->get();

        $supplier = DB::table('suppliers')->get();
        return view('produk.tambahSuplier',compact('produk','supplier'));
    }


    public function detail(Request $request, $kode_produk)
    {
        $produk=DB::table('produks')
        ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
        ->where('id',$kode_produk)->get();

        $idProduk = DB::table('produks')->where('id',$kode_produk)->get();

        $detail = DB::table('suppliers')
        ->join('produk_details','produk_details.kode_supplier','=','suppliers.kode_supplier')
        ->where('produk_details.kode_produk',$kode_produk)
        ->get();

        return view('produk.detail',compact('produk','idProduk','detail'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kodeProduk' => 'required|min:2',
            'namaProduk' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'kodeKategori' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required'
        ]);

        $file = $request->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'produk_foto';
        $file->move($tujuan_upload,$nama_file);


        DB::table('produks')->insert([
            'foto' => $nama_file,
            'kode_produk' => $request->kodeProduk,
            'nama_produk' => $request->namaProduk,
            'kode_kategori' => $request->kodeKategori,
            'ukuran' => $request->ukuran,
            'harga_jual' => $request->harga,
            'stok_min' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal' => date('Y-m-d') 
        ]);

        return redirect('/produk')->with('success','Data Berhasil Ditambahkan !');;;
    }



    public function tambahSupplier(Request $request)
    {
        DB::table('produk_details')->insert([
            'kode_produk' => $request->idProduk,
            'kode_supplier' => $request->kodeSupplier,
            'tanggal' => $request->tanggal
        ]);

        $id =$request->idProduk;

        return redirect('/produk/detail/'.$id)->with('success','Data Berhasil Ditambahkan!');;;
    }

    public function destroy($kode_produk)
    {
        DB::table('produk_details')
        ->where('id',$kode_produk)
        ->delete();

        return redirect('/produk')->with('danger','Data Berhasil Dihapus !');;;
    }

}