<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function submenu()
    {
        return $this->hasMany(Submenu::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
