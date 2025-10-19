<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = ['nama','kode',"status","fakultas_id"];

    public function Fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
