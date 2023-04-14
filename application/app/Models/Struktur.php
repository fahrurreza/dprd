<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'struktur_organisasi';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
