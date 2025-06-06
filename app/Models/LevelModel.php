<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Pastikan tabelnya sesuai di database
    protected $primaryKey = 'level_id'; // Menentukan primary key yang benar
    protected $fillable = ['level_kode', 'level_nama']; // Menambahkan fillable untuk mass assignment
}
?>
