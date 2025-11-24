<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dokumen(){
        return $this->belongsTo(Dokumen::class);
    }

    public function kasus(){
        return $this->belongsTo(Kasus::class);
    }

    public function jenis_kendaraan(){
        return $this->belongsTo(JenisKendaraan::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function gambar_berita_acara(){
        return $this->hasMany(GambarBeritaAcara::class);
    }
}
