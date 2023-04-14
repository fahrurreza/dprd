<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'aspirasi';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
