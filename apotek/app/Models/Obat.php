<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = ['kodeObat', 'namaObat', 'hargaObat', 'sisaObat', 'tanggalKadaluarsa'];
    protected $guard = [];

    public function transaksiKodeKeluar() {
        return $this->hasMany(transaksiKodeKeluar::class, 'kodeObat', 'kodeObat');
    } 

}
