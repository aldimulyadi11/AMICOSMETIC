<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerimaan extends Model
{
    protected $table='penerimaans';
    protected $primaryKey='id';
    protected $field=['kode_pemesanan','kode_produk','kode_supplier','harga','qty','total','tanggal','status'];
}
