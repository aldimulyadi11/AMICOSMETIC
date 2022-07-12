<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index()
    {
        $supplier=DB::table('suppliers')->get();
        return view('supplier.index',compact('supplier'));
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
            'namaSupplier' => 'required|string|min:2|max:191',
            'alamat' => 'required|min:4|string|max:191',
            'notelp' => 'required|max:12',
            'konperson' => 'required',
        ]);
        DB::table('suppliers')->insert([
            'nama_supplier' => $request->namaSupplier,
            'alamat' => $request->alamat,
            'no_telp' => $request->notelp,
            'kontak_person' => $request->konperson,
            'tanggal' => date('Y-m-d'),
        ]);
        return redirect('/supplier')->with('success','Data Berhasil Ditambahkan !');;;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_supplier)
    {
        $supplier=DB::table('suppliers')
        ->where('kode_supplier',$kode_supplier)
        ->get();
        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('suppliers')
        ->where('kode_supplier',$request->kodeSupplier)
        ->update([
            'nama_supplier' => $request->namaSupplier,
            'alamat' => $request->alamat,
            'no_telp' => $request->notelp,
            'kontak_person' =>$request->konperson
        ]);

        return redirect('/supplier')->with('warning','Data Berhasil Diubah !');;;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_supplier)
    {
        DB::table('suppliers')
        ->where('kode_supplier',$kode_supplier)
        ->delete();

        return redirect('/supplier')->with('danger','Data Berhasil Dihapus !');;;
    }
}
