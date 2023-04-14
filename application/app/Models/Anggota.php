<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'anggota';

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
