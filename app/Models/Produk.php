<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'produk_id';
    protected $fillable = [
        'produk_kode', 'produk_nama', 'produk_hrg', 'produk_stock', 'kat_id',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kat_id', 'kat_id');
    }
}
