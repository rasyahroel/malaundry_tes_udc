<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuans';

    protected $fillable = [
        'unit', 'desc', 'status'
    ];

    protected $enumStatus = [
        'aktif' => 'Aktif',
        'nonaktif' => 'Nonaktif',
    ];
    

    public function laundry(){
        return $this->hasMany(Laundry::class);
     }
}
