<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'masyarakat';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'tgl_bergabung',
        'nama',
        'username',
        'password',
        'telp',
        'email'
    ];

    protected $casts = [
        'tgl_bergabung' => 'datetime',
    ];

    public function perjalanans()
    {
        return $this->hasMany(Perjalanan::class);
    }


}
