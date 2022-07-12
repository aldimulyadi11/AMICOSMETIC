<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table='kasirs';
    protected $primaryKey='id';
    protected $field=['nama','username','password','cabang','tanggal'];
}
