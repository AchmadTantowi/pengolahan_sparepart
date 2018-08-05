<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedPart extends Model
{
    protected $fillable = [
        'no_invoice', 'kode_part', 'supplier_id', 'jml_barang'
    ];

    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart');
    }
}