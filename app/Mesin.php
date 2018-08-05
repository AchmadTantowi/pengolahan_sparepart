<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $fillable = [
        'nama', 'keterangan'
    ];
}