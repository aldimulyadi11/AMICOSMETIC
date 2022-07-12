<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stoks extends Model
{
    protected $table='stoks';
    protected $primaryKey='id';
    protected $field=['kode_produk','jumlah_stok','tanggal'];
}
