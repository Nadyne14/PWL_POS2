<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    
    protected $table = 'm_kategori'; // Sesuai dengan nama tabel di database
    protected $primaryKey = 'id';
    public $timestamps = true; // Jika tabel punya created_at dan updated_at

    protected $fillable = [
        'kategori_kode',
        'nama_kategori',
    ];

    // Jika primary key bukan auto-increment, tambahkan ini
    public $incrementing = true;
    protected $keyType = 'int';
}
