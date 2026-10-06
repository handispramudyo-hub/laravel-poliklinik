<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';

    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];

    public function dokters()
    {
        return $this->hasMany(User::class, 'id_poli');
    }

    public function jadwalPeriksas()
    {
        return $this->hasManyThrough(JadwalPeriksa::class, User::class, 'id_poli', 'id_dokter');
    }
}
