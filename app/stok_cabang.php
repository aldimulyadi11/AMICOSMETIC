<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok_cabang extends Model
{
    protected $table='stok_cabangs';
    protected $primaryKey='id';
    protected $field=['cabang','kode_produk','jumlah_stok','tanggal'];
}
