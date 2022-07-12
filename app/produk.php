<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table='produks';
    protected $primaryKey='id';
    protected $field=['kode_produk','nama_produk','kode_kategori','harga_jual','ukuran','stok_min','foto','deskripsi','tanggal'];
}
