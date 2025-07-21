<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable =[
        'name',
        'alamat',
        'no_hp',
    ];

    public function barangs(){
        $this->hasMany(Barang::class);
    }
}
