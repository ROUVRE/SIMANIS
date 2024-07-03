<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan';

    protected $fillable = [
        'subjek',
        'user_id',
        'kategori_id',
        'content',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoriPesan()
    {
        return $this->belongsTo(KategoriPesan::class, 'kategori_id');
    }
}
