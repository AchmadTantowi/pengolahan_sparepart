<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $fillable = [
        'kode_part', 'nama_part', 'stok', 'harga'
    ];



}