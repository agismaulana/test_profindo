<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiObatKeluar extends Model
{
    use HasFactory;
    protected $table = "transaksi_obat_keluar";
    protected $fillable = ['idTransaksi', 'kodeObat', 'jumlahJual', 'kodeApoteker', 'tanggalBeli'];
    protected $guard = [];

    public function apoteker() {
        return $this->belongsTo(Apoteker::class, 'kodeApoteker', 'kodeApoteker');
    }

    public function obat() {
        return $this->belongsTo(Obat::class, 'kodeObat', 'kodeObat');
    }
}
