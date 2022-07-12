<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admins';
    protected $primaryKey='id_admin';
    protected $field=['name','username','password'];
}
