<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    
    protected $table = 'm_kategori'; // Sesuai dengan tabel di database
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'kategori_kode',
        'nama_kategori',
    ];
}
