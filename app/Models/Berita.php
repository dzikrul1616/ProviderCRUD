<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'photo',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return url('storage/photos/' . $this->photo);
        }
        return null;
    }
}
