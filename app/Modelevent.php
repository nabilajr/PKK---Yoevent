<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelevent extends Model
{
    protected $table="event";
    protected $primarykey="id";
         protected $fillable = [
        'nama_event', 'tgl_pelaksana', 'info', 'harga', 'jumlah_tiket', 
     ];
    public $timestamps=false;
}
