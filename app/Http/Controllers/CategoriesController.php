<?php

namespace App\Http\Controllers;

use Session;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index()
    {
        $kategori = DB::table("kategoris")->get();
        return view('kategori.index',compact('kategori'));
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
            'namaKategori' => 'required|string|min:2|max:191',
            'keterangan' => 'required|min:4|string|max:191',
        ]); 

        DB::table('kategoris')->insert([
            'nama_kategori' => $request->namaKategori,
            'keterangan' => $request->keterangan,
            'tanggal' => date('Y-m-d'),
        ]);
        return redirect('/kategori')->with('success','Data Berhasil Ditambahkan !');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_kategori)
    {
        $kategori=DB::table('kategoris')
        ->where('kode_kategori',$kode_kategori)
        ->get();
        return view('kategori.edit',compact('kategori'));
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
        DB::table('categories')
        ->where('kode_kategori',$request->kodeKategori)
        ->update([
            'nama_kategori' => $request->namaKategori,
            'keterangan' => $request->keterangan]);

        return redirect('/kategori')->with('warning','Data Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_kategori)
    {
        DB::table('kategoris')
        ->where('id',$kode_kategori)
        ->delete();

        return redirect('/kategori')->with('danger','Data Berhasil Dihapus !');
    }
}
