<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kode_barang',
        'name',
        'stock',
        'harga',

        'satuan_id',
        'supplier_id',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
