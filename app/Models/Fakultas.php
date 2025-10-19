<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    public function Prodi()
    {
        return $this->belongsToMany(Prodi::class);
    }
}
