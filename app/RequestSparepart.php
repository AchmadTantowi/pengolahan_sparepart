<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestSparepart extends Model
{
    protected $fillable = [
        'no_request', 'nik',  'kode_part', 'mesin_id', 'status_request', 'jumlah', 'status', 'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function part()
    {
        return $this->belongsTo('App\Sparepart');
    }
}