<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoteker extends Model
{
    use HasFactory;
    protected $table = 'Apoteker';
    protected $fillable = ['kodeApoteker', 'namaApoteker', 'tanggalLahir'];
    protected $guard = [];

    public function user() {
        return $this->hasOne(User::class, 'apoteker_id', 'kodeApoteker');
    }

    public function transaksiKodeKeluar() {
        return $this->hasMany(transaksiKodeKeluar::class, 'kodeApoteker', 'kodeApoteker');
    } 

}
