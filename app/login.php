<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table='logins';
    protected $primaryKey='id';
    protected $field=['foto','nama','cabang','jabatan','username','password','tanggal'];
}
