<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = ['nama','keterangan','izin_akses','status'];

    public function Users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
