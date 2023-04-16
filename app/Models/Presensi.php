<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    protected $fillable = [
        'id',
        'jarak',
        'hari',
        'latitude',
        'longitude',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_presensi');
    }
}
