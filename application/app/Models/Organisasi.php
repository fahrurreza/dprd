<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'organisasi';

    public function tugasfungsi()
    {
        return $this->hasMany(Tugasfungsi::class);
    }

    public function tugaspokok()
    {
        return $this->hasMany(Tugaspokok::class);
    }
}
