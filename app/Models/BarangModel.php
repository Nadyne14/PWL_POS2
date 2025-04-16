<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'm_barang';
    protected $primaryKey = 'id';

    protected $fillable = ['kode_barang', 'nama_barang', 'harga', 'stok'];

    // No kategori relationship as no kategori_id column exists in m_barang
    // public function kategori()
    // {
    //     return $this->belongsTo(KategoriModel::class, 'kategori_id', 'id');
    // }
}
