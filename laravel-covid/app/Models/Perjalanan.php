<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;
    protected $table = 'perjalanan';

    protected $primaryKey = 'id_perjalanan';

    protected $casts = [
        'tgl_perjalanan' => 'datetime',

    ];


    protected $fillable = [
        'nik',
        'tgl_perjalanan',
        'suhu_tubuh',
        'lokasi',
        'tempat',
         ];



    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }
}
