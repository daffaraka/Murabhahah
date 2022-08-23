<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_nasabah';

    protected $fillable = 
    [
        'nama',
        'noIdentitas',
        'TTL',
        'jenisKelamin',
        'agama',
        'pekerjaan',
        'pendidikan',
        'noHp',
        'alamat',
        'kelurahan',
        'kecamatan',
        'provinsi',
        'id_user',
        
    ];

    public function Pembiayaan()
    {
        return $this->hasOne(Pembiayaan::class,'id_nasabah');
    }
}
