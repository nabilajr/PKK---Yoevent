<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeltransaksi extends Model
{
     protected $table="transaksi";
    protected $primarykey="id";
     protected $fillable = [
        'id_admin', 'id_event',
     ];
    public $timestamps=false;
}
