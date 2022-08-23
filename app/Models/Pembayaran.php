<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'nama_penyetor',
        'angsuran_ke',
        'angsuran_bulan',
        'jumlah_bayar',
        'tanggal_bayar',
        'id_pembiayaan'
    ];

    public function Pembiayaan()
    {
        return $this->belongsTo(Pembiayaan::class,'id_pembiayaan');
    }
}
