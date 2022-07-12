<?php

namespace App\Http\Controllers;

use DB;
use App\stoks;
use App\penerimaan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
     public function index()
    {
        $pemesanan = DB::table('pemesanans')
        ->join('suppliers','suppliers.kode_supplier','=','pemesanans.kode_supplier')
        ->get();
        $supplier=DB::table('suppliers')->get();
       return view('penerimaan.index',compact('pemesanan','supplier'));
    }

    public function detail(Request $request,$kode_pemesanan)
    {

        $penerimaan=DB::table('penerimaans')
        ->select('penerimaans.*','produks.kode_produk','produks.nama_produk','pemesanans.kode_pemesanan')
        ->join('pemesanans','pemesanans.id','=','penerimaans.kode_pemesanan')
        ->join('produks','produks.id','=','penerimaans.kode_produk')
        ->where('pemesanans.id',$kode_pemesanan)
        ->get();

        $pemesanan=DB::table('pemesanans')
        ->join('suppliers','suppliers.kode_supplier','=','pemesanans.kode_supplier')
        ->where('pemesanans.id',$kode_pemesanan)
        ->get();


        $idPemesanan = DB::table('pemesanans')->where('id',$kode_pemesanan)->get();

        $rincian = DB::table('pemesanan_details')
        ->join('produks','produks.id','=','pemesanan_details.kode_produk')
        ->where('pemesanan_details.kode_pemesanan',$kode_pemesanan)
        ->get();
        return view('penerimaan.detail',compact('pemesanan','idPemesanan','rincian','penerimaan'));

    }
    
    // public function penerimaan()
    // {
    //     $penerimaan=DB::table('penerimaans')
    //     ->select('penerimaans.*','produks.kode_produk','produks.nama_produk','pemesanans.kode_pemesanan')
    //     ->join('pemesanans','pemesanans.id','=','penerimaans.kode_pemesanan')
    //     ->join('produks','produks.id','=','penerimaans.kode_produk')
        
    //     ->get();

    //     return view('penerimaan.index',compact('penerimaan'));
    // }


    public function realise(Request $request,$kode_penerimaan)
    {
        $penerimaan=DB::table('penerimaans')
        ->join('produks','produks.id','=','penerimaans.kode_produk')
        ->where('penerimaans.id_penerimaan',$kode_penerimaan)
        ->get();

        return view('penerimaan.realise',compact('penerimaan'));
    }


    public function update(Request $request) 
    {
        $st = 'Full Realise';
            //select qty di db penerimaan
        $kod = penerimaan::where('id_penerimaan', $request->idPenerimaan)->get();
            foreach($kod as $data){
              $tam = $data->qty;
            }
        $total2 = $tam - $request->qty;

            ////select kode produk
        $cekId = stoks::where('kode_produk',$request->idProduk)->get();
        foreach ($cekId as $data) {
            $kode_produk = $data->kode_produk;
        }
         

/////////////////////////////////////////////////////////////////////////////

        foreach ($cekId as $id) {
            if($id->kode_produk == $request->idProduk){
                $upd = stoks::where('stoks.kode_produk',$request->idProduk)->get();
                foreach($upd as $data){
                  $stk =  $data->jumlah_stok;
                }
                $total = $stk + $request->qty;

                DB::table('stoks')->where('kode_produk',$request->idProduk)->update(['jumlah_stok' => $total]) ;

                DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
                ->update(['qty' => $total2]);

                if($request->qty == $tam){
                    DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
                    ->update(['status' => $st]); 
                }
                return redirect('/penerimaan/detail/'.$request->idPemesanan)->with('success','Data Berhasil Ditambahkan !');
            }
        }
        DB::table('stoks')->insert([
                'kode_produk' => $request->idProduk,
                'jumlah_stok' => $request->qty,
                'tanggal' => $request->tanggal
                ]);
        DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
                ->update(['qty' => $total2]);

        if($request->qty == $tam){
            DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
            ->update(['status' => $st]); 
        }

        return redirect('/penerimaan/detail/'.$request->idPemesanan)->with('success','Data Berhasil Ditambahkan !');

    }
        

        

         
        
  
////////condition ketika kode produk sudah ada////////////////////////////////
        // if(empty($kode)){
        //     DB::table('stoks')->insert([
        //         'kode_produk' => $request->idProduk,
        //         'jumlah_stok' => $request->qty,
        //         'tanggal' => date('Y-m-d')
        //     ]);

        //     DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
        //     ->update(['qty' => $total2]); 

        //     if($request->qty == $tam){
        //         DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
        //         ->update(['status' => $st]); 
        //     }

        //     return redirect('/penerimaan')->with('success','Data Berhasil Direalise!');
        // }else{
        //    if($request->idProduk != $kode_produk){

        //     DB::table('stoks')->insert([
        //         'kode_produk' => $request->idProduk,
        //         'jumlah_stok' => $request->qty,
        //         'tanggal' => date('Y-m-d')
        //     ]);

        //     DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
        //     ->update(['qty' => $total2]); 

        //     if($request->qty == $tam){
        //         DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
        //         ->update(['status' => $st]); 
        //     }

        //     return redirect('/penerimaan')->with('success','Data Berhasil Direalise!');

        //     }else{
        //     $upd = stoks::where('stoks.kode_produk',$request->idProduk)->get();
        //     foreach($upd as $data){
        //       $stk =  $data->jumlah_stok;
        //     }
        //     $ttl = $stk + $request->qty;

        //     DB::table('stoks')->where('kode_produk',$request->idProduk)->update(['jumlah_stok' => $ttl]) ;

        //     DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
        //     ->update(['qty' => $total2]); 

        //     if($request->qty == $tam){
        //         DB::table('penerimaans')->where('penerimaans.id_penerimaan',$request->idPenerimaan)
        //         ->update(['status' => $st]); 
        //     } 

        //  return redirect('/penerimaan')->with('success','Data Berhasil Realise!');
        // } 
        //}
        
    //}
}