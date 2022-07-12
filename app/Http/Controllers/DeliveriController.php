<?php

namespace App\Http\Controllers;

use DB;
use App\stok_cabang;
use App\produk;
use Illuminate\Http\Request;

class DeliveriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = DB::table('cabangs')->get();

        $deliveri = DB::table('deliveris')
        ->join('cabangs','cabangs.kode_cabang','=','deliveris.cabang')->get();
        return view('deliveri.index',compact('deliveri','cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'kode_cabang' => 'required',
            'tanggal' => 'required',
        ]);

        $string = str_random(9);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000, 9999)
            .mt_rand(100, 999)
            .$characters[rand(0,strlen($characters) - 1)];
        $string = str_shuffle($pin);

        DB::table('deliveris')
        ->insert([
            'kode_deliveri' => $string,
            'cabang' => $request->kode_cabang,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/deliveri')->with('success','Deliver baerhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id_deliveri)
    {
        $deliveri_detail = DB::table('deliveri_details')
        ->join('produks','produks.id','=','deliveri_details.produk')
        ->join('deliveris','deliveris.id_deliveri','=','deliveri_details.id_deliveri')
        ->join('cabangs','cabangs.kode_cabang','=','deliveris.cabang')
        ->where('deliveri_details.id_deliveri',$id_deliveri)
        ->get();

        $produk = DB::table('produks')->get();

        $deliveri = DB::table('deliveris')
        ->where('deliveris.id_deliveri',$id_deliveri)
        ->get();

        return view('deliveri.detail',compact('deliveri','deliveri_detail','produk'));
    }

    public function tambahProduk(Request $request)
    {
        $this->validate($request, [
            'kodeProduk' => 'required',
            'jumlahProduk' => 'required',
            'tanggal' => 'required',
        ]);


        $cekId = produk::where('kode_produk',$request->kodeProduk)->get();
        foreach ($cekId as $data) {
            $tamp = $data->id;
        }

        DB::table('deliveri_details')->insert([
            'id_deliveri' => $request->id_deliveri,
            'produk' => $tamp,
            'jumlah_produk' => $request->jumlahProduk,
            'tanggal' => $request->tanggal,
        ]);
        
        //stok barang
        $x = DB::table('stoks')->select('jumlah_stok')->where('kode_produk',$tamp)->sum('jumlah_stok');
        $y = $request->jumlahProduk;
        $total2 = $x - $y;

        if ($y <= $x )
        {
            $produkId = DB::select("select DISTINCT kode_produk from stok_cabangs where kode_produk = ".$tamp);
            
            foreach ($produkId as $id) 
            {
                if($id->kode_produk == $tamp){
                    $upd = stok_cabang::where('stok_cabangs.kode_produk',$tamp)->get();
                    foreach($upd as $data){
                      $stk =  $data->jumlah_stok;
                    }
                    
                    $total = $stk + $request->jumlahProduk;

                    DB::table('stok_cabangs')->where('kode_produk',$tamp)->update(['jumlah_stok' => $total]) ;
                    DB::table('stoks')->where('kode_produk',$tamp)->update(['jumlah_stok' => $total2]) ;
                    return redirect('/deliveri/detail/'.$request->id_deliveri)->with('success','Data Berhasil Ditambahkan !');
                }
            }
            
            DB::table('stok_cabangs')->insert([
                'cabang' => $request->cabang,
                'kode_produk' => $tamp,
                'jumlah_stok' => $request->jumlahProduk,
                'tanggal' => $request->tanggal,
                ]);
            DB::table('stoks')->where('kode_produk',$tamp)->update(['jumlah_stok' => $total2]) ;
            return redirect('/deliveri/detail/'.$request->id_deliveri)->with('success','Data Berhasil Ditambahkan !');
        }
    }


     public function stok()
    {
        $detail = DB::table('produks')
        ->select('produks.kode_produk','produks.nama_produk','produks.stok_min','kategoris.nama_kategori','stok_cabangs.jumlah_stok','cabangs.nama_cabang')
        ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
        ->join('stok_cabangs','stok_cabangs.kode_produk','=','produks.id')
        ->join('cabangs','cabangs.kode_cabang','=','stok_cabangs.cabang')
        ->get();
        // $stok=DB::table('stoks')->get();
        return view('stok.stok_cabang',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
