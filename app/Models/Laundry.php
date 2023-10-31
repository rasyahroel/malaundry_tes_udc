<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;
    
    protected $table = 'laundrys';

    protected $fillable = [
        'kuota', 'berat', 'price', 'cabang', 'status', 'satuans_id'
    ];

    protected $enumStatus = [
        'aktif' => 'Aktif',
        'nonaktif' => 'Nonaktif',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuans_id');
    }
}
