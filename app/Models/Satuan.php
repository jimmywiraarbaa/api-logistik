<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $fillable = [
        'name'
    ];

    public function barangs(){
        $this->hasMany(Barang::class);
    }
}
