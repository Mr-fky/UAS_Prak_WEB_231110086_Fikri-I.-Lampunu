<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'tanggal', 'jumlah', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
