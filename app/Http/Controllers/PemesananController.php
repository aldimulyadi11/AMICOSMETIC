<?php

namespace App\Http\Controllers;

use DB;
use App\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    
    public function index()
    {
        $pemesanan = DB::table('pemesanans')
        ->join('suppliers','suppliers.kode_supplier','=','pemesanans.kode_supplier')
        ->get();
        $supplier=DB::table('suppliers')->get();
       return view('pemesanan.index',compact('pemesanan','supplier'));
    }

    //penerimaan
    
    //end penerimaan


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $pemesanan = DB::table('pemesanans')->where('id',$id)->get();
        $produk = DB::table('produks')->get();
        $cancel = DB::table('produks')->where('id',$id)->get();
        return view('pemesanan.tambahProduk',compact('pemesanan','produk','cancel'));
    }

    public function detail(Request $request,$kode_pemesanan)
    {
        $pemesanan=DB::table('pemesanans')
        ->join('suppliers','suppliers.kode_supplier','=','pemesanans.kode_supplier')
        ->where('pemesanans.id',$kode_pemesanan)
        ->get();


        $idPemesanan = DB::table('pemesanans')->where('id',$kode_pemesanan)->get();

        $rincian = DB::table('pemesanan_details')
        ->join('produks','produks.id','=','pemesanan_details.kode_produk')
        ->where('pemesanan_details.kode_pemesanan',$kode_pemesanan)
        ->get();
        return view('pemesanan.detail',compact('pemesanan','idPemesanan','rincian'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $string = str_random(7);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100, 999)
            .mt_rand(100, 999)
            .$characters[rand(0,strlen($characters) - 1)];
        $string = str_shuffle($pin);
        DB::table('pemesanans')->insert([
            'kode_pemesanan' => $string,
            'kode_supplier' => $request->kodeSupplier,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('/pemesanan')->with('success','Data Berhasil Ditambahkan!');;;
    }


    public function tambahProduk(Request $request)
    {
        $total= 0;
         DB::table('pemesanan_details')->insert([
            'kode_pemesanan' => $request->kodePemesanan,
            'kode_produk' => $request->kodeProduk,
            'kode_supplier' => $request->kodeSupplier,
            'harga' => $request->harga,
            'qty' =>$request->qty,
            'total' =>$request->total,
            'tanggal' => $request->tanggal
        ]);

         $status = 'Realise';
         DB::table('penerimaans')->insert([
            'kode_pemesanan' => $request->kodePemesanan,
            'kode_produk' => $request->kodeProduk,
            'kode_supplier' => $request->kodeSupplier,
            'harga' => $request->harga,
            'qty' =>$request->qty,
            'total' =>$request->total,
            'tanggal' => $request->tanggal,
            'status' => $status
        ]);

       return redirect('/pemesanan/detail/'.$request->kodePemesanan)->with('success','Data Berhasil Ditambahkan!');
    }
}
