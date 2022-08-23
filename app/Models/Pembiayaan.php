<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembiayaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembiayaan';

    protected $fillable = 
    [
        'id_nasabah',
        'nomor_pembiayaan',
        'nilai_pembiayaan',
        'margin_keuntungan',
        'total_pembiayaan',
        'jumlah_angsuran',
        'jatuh_tempo'   

    ];

    public function Nasabah()
    {
        return $this->belongsTo(Nasabah::class,'id_nasabah');
    }

    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
