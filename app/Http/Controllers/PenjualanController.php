<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use App\stoks;
use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\session;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function offline()
    {
        $penjualan = DB::table('pembelis')
        ->join('cabangs','cabangs.kode_cabang','=','pembelis.cabang')
        ->get();

        $cabang = DB::table('cabangs')->get();
        return view('penjualan.offline.offline',compact('penjualan','cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pembeli(Request $request)
    {
         $string = str_random(9);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100, 999)
            .mt_rand(100, 999)
            .$characters[rand(0,strlen($characters) - 1)];
        $string = str_shuffle($pin);
        DB::table('pembelis')->insert([
                'kode' => $string,
                'nama_pembeli' => $request->namaPembeli,
                'cabang' => $request->cabang,
                'tanggal' => date('Y-m-d'),
            ]);

        return redirect('/penjualan/offline')->with('success','Data Berhasil Ditambahkan !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $kode_pembeli)
    {

        $pembeli= DB::table('pembelis')
        ->join('cabangs','cabangs.kode_cabang','=','pembelis.cabang')
        ->where('pembelis.kode_pembeli',$kode_pembeli)->get();

        $produk = DB::table('produks')->get();

        $penjualan = DB::table('penjualans')
        ->join('produks','produks.id','=','penjualans.kode_produk')
        ->join('pembelis','pembelis.kode_pembeli','=','penjualans.pembeli')
        ->where('penjualans.pembeli',$kode_pembeli)
        ->get();

        $total = DB::table('penjualans')
        ->join('produks','produks.id','=','penjualans.kode_produk')
        ->join('pembelis','pembelis.kode_pembeli','=','penjualans.pembeli')
        ->where('penjualans.pembeli',$kode_pembeli)
        ->sum('total');

        $tanggal = date('d-m-Y H:i:s');
        session::put('tanggal',$tanggal);
        session::put('pembeli',$pembeli);
        session::put('penjualan',$penjualan);
        session::put('total',$total);

        return view('penjualan.offline.penerima',compact('pembeli','produk','penjualan'));
        
    }

    public function cetakPenjualan()
    {
        $tanggal = session::get('tanggal');
        $pembeli = session::get('pembeli');
        $penjualan = session::get('penjualan');
        $total = session::get('total');

        $pdf = PDF::loadview('penjualan.offline.struk',compact('pembeli','penjualan','total','tanggal'));

        $customPaper = array(0,0,127.559,595.276);
        return $pdf->setPaper($customPaper)->stream();
    }




   
    public function store(Request $request)
    {
        $cekId = produk::where('kode_produk',$request->kode_produk)->get();
        foreach ($cekId as $data) {
            $tamp = $data->id;
        }
        $x = DB::table('stok_cabangs')->select('jumlah_stok')
        ->where([
            ['kode_produk','=',$tamp],
            ['cabang','=',$request->cabang]
        ])->first();
        $y = $request->qty;
        

        if ($y <= $x->jumlah_stok ){
            DB::table('penjualans')->insert([
                'kode_produk' => $tamp,
                'harga' => $request->harga,
                'qty' => $request->qty,
                'diskon' => $request->diskon,
                'total' => $request->total,
                'pembeli' => $request->pembeli,
                'tanggal' => date('Y-m-d')
                
            ]);
            $stok=$x->jumlah_stok - $y;
            DB::table('stok_cabangs')
            ->where([
                ['kode_produk','=',$tamp],
                ['cabang','=',$request->cabang]

            ])->update(['jumlah_stok' => $stok]) ;
            return redirect ('/penjualan/detailPembeli/'.$request->pembeli)->with('success','Data Berhasil Ditambahkan !');
        }else{
            return redirect ('/penjualan/detailPembeli/'.$request->pembeli)->with('danger','Stok Tidak Mencukupi !');
        }
    }
}
