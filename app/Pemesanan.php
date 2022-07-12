<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table='pemesanans';
    protected $primaryKey='kode_pemesanan';
    protected $field=['kode_produk','supplier','harga','qty','total','status','tanggal'];
}
