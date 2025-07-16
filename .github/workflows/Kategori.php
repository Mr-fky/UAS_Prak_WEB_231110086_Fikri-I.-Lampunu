<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jenis'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
