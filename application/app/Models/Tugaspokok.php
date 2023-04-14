<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugaspokok extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tugas_pokok';

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
