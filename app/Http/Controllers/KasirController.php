<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Kasir;
use App\stoks;
use App\produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Auth;


class KasirController extends Controller
{
   

    public function dashboard()
    {
        if(!Session::get('login2')){
            return redirect('/');
        }else{
            $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');
        return view('kasir.index',compact('kode_kasir','kode_cabang','nama'));
        }
        
    }

    public function kategori()
    {
        $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');
        $kategori = DB::table("kategoris")->get();
        return view('kasir.kategori',compact('kategori','kode_kasir','kode_cabang','nama'));
    }

    public function produk()
    {
        $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');
        $produk = DB::table("produks")
        ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')->get();
        return view('kasir.produk',compact('produk','kode_kasir','kode_cabang','nama'));
    }

    public function penjualan()
    {
        $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');
        $penjualan = DB::table('pembelis')
        ->join('cabangs','cabangs.kode_cabang','=','pembelis.cabang')
        ->join('kasirs','kasirs.cabang','=','cabangs.kode_cabang')
        ->where('kasirs.id',$kode_kasir)
        ->get();

        $cabang = DB::table('cabangs')->get();
        return view('kasir.penjualan',compact('penjualan','cabang','kode_kasir','kode_cabang','nama'));
    }

    public function pembeli(Request $request)
    {
        $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');
        $kd_cabang = DB::table('cabangs')->select('kode_cabang')
        ->join('kasirs','kasirs.cabang','=','cabangs.kode_cabang') 
        ->where('kasirs.id',$kode_kasir)
        ->get();
        DB::table('pembelis')->insert([
                'nama_pembeli' => $request->namaPembeli,
                'cabang' => $kd_cabang[0]->kode_cabang,
                'tanggal' => date('Y-m-d'),
            ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan !');
    }

     public function detail(Request $request, $kode_pembeli)
    {
        $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');

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

        $tgl = date('d-m-Y H:i:s');
        session::put('tanggal',$tgl);
        session::put('pembeli',$pembeli);
        session::put('penjualan',$penjualan);
        session::put('total',$total);

        return view('kasir.penjualan.pembeli',compact('pembeli','produk','penjualan','kode_kasir','kode_cabang','nama'));
        
    }

    public function cetakPenjualan()
    {
        $nama = Session::get('nama');
        $tanggal = session::get('tanggal');
        $pembeli = session::get('pembeli');
        $penjualan = session::get('penjualan');
        $total = session::get('total');

        $pdf = PDF::loadview('kasir.penjualan.struk',compact('nama','pembeli','penjualan','total','tanggal'));

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
            DB::table('stok_cabangs')->where([
                ['kode_produk','=',$tamp],
                ['cabang','=',$request->cabang]
            ])->update(['jumlah_stok' => $stok]) ;
            return redirect ('/kasir/detailPembeli/'.$request->pembeli)->with('success','Data Berhasil Ditambahkan !');
        }else{
            return redirect ('/kasir/detailPembeli/'.$request->pembeli)->with('danger','Stok Tidak Mencukupi !');
        }
    }


    public function editKasir()
    {
        $kode_kasir = Session::get('kode_kasir');
        $kode_cabang = Session::get('kode_cabang');
        $nama = Session::get('nama');

         $edit = DB::table('kasirs')
        ->join('cabangs','cabangs.kode_cabang','=','kasirs.cabang')
        ->where('kasirs.id',$kode_kasir)
        ->get();

        return view('kasir.edit',compact('edit','kode_kasir','kode_cabang','nama'));
    }

    public function updateKasir(Request $request)
    {
        $userId = $request->kodeKasir;
        $namaKasir = $request->namaKasir;
        $passBaru = bcrypt($request->passBaru);

        DB::table('kasirs')->where('kasirs.id',$userId)
        ->update(['nama' => $namaKasir, 'password' => $passBaru]);
        
        return redirect('/dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
