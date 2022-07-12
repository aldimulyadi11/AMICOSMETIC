<?php

namespace App\Http\Controllers;

use DB;
use App\stoks;
use App\pembelian_detail;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index()
    {
        $pembelian = DB::table('pembelians')
        ->join('suppliers','suppliers.kode_supplier','=','pembelians.kode_supplier')
        ->get();
        $produk=DB::table('produks')->get();
        $supplier = DB::table('suppliers')->get();
       return view('pembelian.index',compact('pembelian','produk','supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $pembelian = DB::table('pembelians')->where('id',$id)->get();
        $produk = DB::table('produks')->get();
        $cancel = DB::table('produks')->where('id',$id)->get();
        return view('pembelian.tambahProduk',compact('pembelian','produk','cancel'));
    }

    public function detail(Request $request, $kode_pembelian)
    { 

        $pembelian = DB::table('pembelians')
        ->join('suppliers','suppliers.kode_supplier','=','pembelians.kode_supplier')
        ->where('pembelians.id',$kode_pembelian)
        ->get();

        $idPembelian = DB::table('pembelians')->where('id',$kode_pembelian)->get();

        $rincian = DB::table('pembelian_details')
        ->join('produks','produks.id','=','pembelian_details.kode_produk')
        ->where('pembelian_details.kode_pembelian',$kode_pembelian)
        ->get();

        $produk = DB::table('produks')->get();
        return view('pembelian.detail',compact('pembelian','idPembelian','rincian','produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $string = str_random(9);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999)
            .mt_rand(100, 999)
            .$characters[rand(0,strlen($characters) - 1)];
        $string = str_shuffle($pin);
        DB::table('pembelians')->insert([
            'kode_pembelian' => $string,
            'kode_supplier' => $request->kodeSupplier,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('/pembelian')->with('success','Data Berhasil Ditambahkan !');
        
    }

    public function tambahProduk(Request $request)
    {
        DB::table('pembelian_details')->insert([
            'kode_pembelian' => $request->kodePembelian,
            'kode_produk' => $request->kodeProduk,
            'kode_supplier' => $request->kodeSupplier,
            'harga' => $request->harga,
            'qty' =>$request->qty,
            'total' =>$request->total,
            'tanggal' => $request->tanggal
        ]);


        $cekId = DB::select("select DISTINCT kode_produk from stoks where kode_produk = ".$request->kodeProduk);

        foreach ($cekId as $id) {
            if($id->kode_produk == $request->kodeProduk){
                $upd = stoks::where('stoks.kode_produk',$request->kodeProduk)->get();
                foreach($upd as $data){
                  $stk =  $data->jumlah_stok;
                }
                $total = $stk + $request->qty;

                DB::table('stoks')->where('kode_produk',$request->kodeProduk)->update(['jumlah_stok' => $total]) ;
                return redirect('/pembelian/detail/'.$request->kodePembelian)->with('success','Data Berhasil Ditambahkan !');
            }
        }

        DB::table('stoks')->insert([
                'kode_produk' => $request->kodeProduk,
                'jumlah_stok' => $request->qty,
                'tanggal' => $request->tanggal
                ]);
        return redirect('/pembelian/detail/'.$request->kodePembelian)->with('success','Data Berhasil Ditambahkan !');


         
        
    }


     public function stok()
    {
        $detail = DB::table('produks')
        ->select('produks.kode_produk','produks.nama_produk','produks.stok_min','kategoris.nama_kategori','stoks.jumlah_stok')
        ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
        ->join('stoks','stoks.kode_produk','=','produks.id')
        ->get();
        // $stok=DB::table('stoks')->get();
        return view('stok.stok',compact('detail'));
    }

}    