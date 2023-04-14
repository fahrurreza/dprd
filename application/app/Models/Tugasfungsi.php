<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasfungsi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tugas_fungsi';

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
