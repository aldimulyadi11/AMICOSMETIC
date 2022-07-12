<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $cabang=DB::table('cabangs')->get();
        return view('cabang.index',compact('cabang'));
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
            'namaCabang' => 'required|string|min:2',
            'alamat' => 'required|string|min:4|max:191',
            'jenis' => 'required|string|min:4|max:191',
        ]);
        DB::table('cabangs')->insert([
            'nama_cabang' => $request->namaCabang,
            'alamat' => $request->alamat,
            'jenis' => $request->jenis,
            'tanggal' => date('Y-m-d'),
        ]);
        return redirect('/cabang')->with('success','Data Berhasil Ditambahkan !');
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
    public function edit($kode_cabang)
    {
        $cabang=DB::table('cabangs')
        ->where('kode_cabang',$kode_cabang)
        ->get();
        return view('cabang.edit',compact('cabang'));
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
        DB::table('cabangs')
        ->where('id',$request->id)
        ->update([
            'nama_cabang' => $request->namaCabang,
            'alamat' => $request->alamat,
            'jenis' => $request->jenis,
            'tanggal' => date('Y-m-d')
        ]);

        return redirect('/cabang')->with('warning','Data Berhasil Diubah !');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_cabang)
    {
        DB::table('cabangs')
        ->where('id',$kode_cabang)
        ->delete();

        return redirect('/cabang')->with('danger','Data Berhasil Dihapus !');;;
    }
}
