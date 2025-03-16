<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    protected $table = 'm_barang'; // Sesuaikan dengan nama tabel barang
    protected $primaryKey = 'barang_id'; // Sesuaikan dengan primary key tabel barang

    protected $fillable = ['barang_kode', 'barang_nama', 'kategori_id', 'harga', 'stok'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}
