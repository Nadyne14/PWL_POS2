<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'id'; // Adjust if primary key is different
    public $timestamps = true; // Adjust if timestamps are used

    protected $fillable = [
        // Add fillable fields as per your table columns
    ];
}
