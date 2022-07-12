<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\session;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    ///////////////////////////////PEMESANAN///////////////////////////////////
    public function pemesanan()
    {
        $pemesanan=DB::table('pemesanan_details')
                ->join('produks','produks.id','=','pemesanan_details.kode_produk')
                ->join('suppliers','suppliers.kode_supplier','=','pemesanan_details.kode_supplier')
                ->select('pemesanan_details.*','produks.nama_produk','suppliers.nama_supplier')
                ->get();
         $total=DB::table('pemesanan_details')
                ->join('produks','produks.id','=','pemesanan_details.kode_produk')
                ->join('suppliers','suppliers.kode_supplier','=','pemesanan_details.kode_supplier')
                ->select('pemesanan_details.*','produks.nama_produk','suppliers.nama_supplier')
                ->sum('total');
        return view('laporan.pemesanan.pemesanan',compact('pemesanan','total'));
    }

    public function laporanPemesanan(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $pemesanan=DB::table('pemesanan_details')
                ->join('produks','produks.id','=','pemesanan_details.kode_produk')
                ->join('suppliers','suppliers.kode_supplier','=','pemesanan_details.kode_supplier')
                ->select('pemesanan_details.*','produks.nama_produk','suppliers.nama_supplier')
                ->whereBetween('pemesanan_details.tanggal', array($start, $end))
                ->get();

        $total=DB::table('pemesanan_details')
                ->join('produks','produks.id','=','pemesanan_details.kode_produk')
                ->join('suppliers','suppliers.kode_supplier','=','pemesanan_details.kode_supplier')
                ->select('pemesanan_details.*','produks.nama_produk','suppliers.nama_supplier')
                ->whereBetween('pemesanan_details.tanggal', array($start, $end))
                ->sum('total');

        session::put('pemesanan',$pemesanan);
        session::put('total',$total);

        return view('laporan.pemesanan.pemesanan',compact('pemesanan','total'));
    }


    public function cetakPemesanan()
    {
        $pemesanan = session::get('pemesanan');
        $total = session::get('total');
        $pdf = PDF::loadview('laporan.pemesanan.pemesanan_pdf',compact('pemesanan','total'));
        return $pdf->stream();
    }


///////////////////////////////PEMBELIAN///////////////////////////////////
    public function pembelian()
    {
        $pembelian=DB::table('pembelian_details')
                ->join('produks','produks.id','=','pembelian_details.kode_produk')
                ->join('suppliers','suppliers.kode_supplier','=','pembelian_details.kode_supplier')
                ->select('pembelian_details.*','produks.nama_produk','suppliers.nama_supplier')
                ->get();
         $total = DB::table('pembelian_details')
        ->join('produks','produks.id','=','pembelian_details.kode_produk')
        ->join('suppliers','suppliers.kode_supplier','=','pembelian_details.kode_supplier')
        ->select('pembelian_details.*','produks.nama_produk','suppliers.nama_supplier')
        ->sum('total');
        return view('laporan.pembelian.pembelian',compact('pembelian','total'));
    }

    public function laporanPembelian(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $pembelian=DB::table('pembelian_details')
        ->join('produks','produks.id','=','pembelian_details.kode_produk')
        ->join('suppliers','suppliers.kode_supplier','=','pembelian_details.kode_supplier')
        ->select('pembelian_details.*','produks.nama_produk','suppliers.nama_supplier')
        ->whereBetween('pembelian_details.tanggal', array($start, $end))
        ->get();

        $total = DB::table('pembelian_details')
        ->join('produks','produks.id','=','pembelian_details.kode_produk')
        ->join('suppliers','suppliers.kode_supplier','=','pembelian_details.kode_supplier')
        ->select('pembelian_details.*','produks.nama_produk','suppliers.nama_supplier')
        ->whereBetween('pembelian_details.tanggal', array($start, $end))
        ->sum('total');

        session::put('pembelian',$pembelian);
        session::put('total',$total);

        return view('laporan.pembelian.pembelian',compact('pembelian','total'));
    }


    public function cetakPembelian()
    {
        $pembelian = session::get('pembelian');
        $total = session::get('total');
        $pdf = PDF::loadview('laporan.pembelian.pembelian_pdf',compact('pembelian','total'));
        return $pdf->stream();
    }


    

///////////////////////////////PENJUALAN///////////////////////////////////
    public function penjualan()
    {
        
        $penjualan = DB::table('penjualans')
        ->join('produks','produks.id','penjualans.kode_produk')
        ->get();

        $total = DB::table('penjualans')
        ->select('penjualans.*','produks.*')
        ->join('produks','produks.id','penjualans.kode_produk')
        ->sum('total');

        $cabang = DB::table('cabangs')->get();

        return view('laporan.penjualan.penjualan',compact('cabang','penjualan','total'));
    }


    public function laporanPenjualan(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $cabang = $request->cabang;
        $penjualan = DB::table('penjualans')
        ->select('penjualans.*','produks.*')
        ->join('produks','produks.id','penjualans.kode_produk')
        ->join('pembelis','pembelis.kode_pembeli','penjualans.pembeli')
        ->join('cabangs','cabangs.kode_cabang','pembelis.cabang')
        ->whereBetween('penjualans.tanggal', array($start, $end))
        ->where('cabangs.kode_cabang',$cabang)
        ->get();

        $total = DB::table('penjualans')
        ->select('penjualans.*','produks.*')
        ->join('produks','produks.id','penjualans.kode_produk')
        ->join('pembelis','pembelis.kode_pembeli','penjualans.pembeli')
        ->join('cabangs','cabangs.kode_cabang','pembelis.cabang')
        ->whereBetween('penjualans.tanggal', array($start, $end))
        ->where('cabangs.kode_cabang',$cabang)
        ->sum('total');

        session::put('penjualan',$penjualan);
        session::put('total',$total);

        return view('laporan.penjualan.penjualan',compact('penjualan','total'));
    }

    public function cetakPenjualan()
    {
        $penjualan = session::get('penjualan');
        $total = session::get('total');
        $pdf = PDF::loadview('laporan.penjualan.penjualan_pdf',compact('penjualan','total'));
        return $pdf->stream();
    }

   
///////////////////////////////PENGELUARAN///////////////////////////////////
    public function pengeluaran()
    {
        $pengeluaran=DB::table('pengeluarans')
        ->whereBetween('tanggal', array($start, $end))
        ->get();

        $total=DB::table('pengeluarans')
        ->sum('jumlah');
        return view('laporan.pengeluaran.pengeluaran',compact('pengeluaran','total'));
    }


    public function laporanPengeluaran(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $pengeluaran=DB::table('pengeluarans')
        ->whereBetween('tanggal', array($start, $end))
        ->get();

        $total=DB::table('pengeluarans')
        ->whereBetween('tanggal', array($start, $end))
        ->sum('jumlah');

        session::put('pengeluaran',$pengeluaran);
        session::put('total',$total);
        return view('laporan.pengeluaran.pengeluaran',compact('pengeluaran','total'));
    }

    public function cetakPengeluaran()
    {
        $pengeluaran = session::get('pengeluaran');
        $total = session::get('total');
        $pdf = PDF::loadview('laporan.pengeluaran.pengeluaran_pdf',compact('pengeluaran','total'));
        return $pdf->stream();
    }

///////////////////////////////LABA///////////////////////////////////
    public function laba()
    {
        $penjualan=DB::table('penjualans')
        ->sum('total');

        $pengeluaran=DB::table('pengeluarans')
        ->sum('jumlah');

        $pembelian = DB::table('pembelian_details')
        ->sum('total');

        $pemesanan=DB::table('pemesanan_details')
        ->sum('total');

        $total= $pengeluaran + $pembelian + $pemesanan;
        $laba = $penjualan -$total;
        return view('laporan.laba.laba',compact('laba','penjualan','pengeluaran','pembelian','pemesanan','total'));
    }

    public function laporanLaba(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));


        $penjualan=DB::table('penjualans')
        ->whereBetween('tanggal', array($start, $end))
        ->sum('total');

        $pengeluaran=DB::table('pengeluarans')
        ->whereBetween('tanggal', array($start, $end))
        ->sum('jumlah');

        $pembelian = DB::table('pembelian_details')
        ->whereBetween('tanggal', array($start, $end))
        ->sum('total');

        $pemesanan=DB::table('pemesanan_details')
        ->whereBetween('tanggal', array($start, $end))
        ->sum('total');

        $total= $pengeluaran + $pembelian + $pemesanan;
        $laba = $penjualan -$total;

        session::put('penjualan',$penjualan);
        session::put('totalPengeluaran',$total);
        session::put('laba',$laba);
        return view('laporan.laba.laba',compact('penjualan','total','laba'));
    }

    public function cetakLaporanLaba(Request $request)
    {
        $penjualan = session::get('penjualan');
        $total = session::get('totalPengeluaran');
        $laba = session::get('laba');
        $pdf = PDF::loadview('laporan.laba.cetakLaporanLaba',compact('penjualan','total','laba'));
        return $pdf->stream();
    }
}