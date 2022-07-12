<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian_detail extends Model
{
    protected $table='pembelian_details';
    protected $primaryKey='id';
    protected $field=['kode_pembelian','kode_produk','kode_supplier','harga','qty','total','tanggal'];
}
