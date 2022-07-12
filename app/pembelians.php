<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelians extends Model
{
    protected $table='pembelians';
    protected $primaryKey='kode_pembelian';
    protected $field=['kode_produk','jumlaj_stok','tanggal'];
}
