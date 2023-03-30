<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tunggakan extends Model
{
    use HasFactory;
    protected $table = 'tunggakans';
    protected $fillable = ['nis','nama_siswa','id_kelas','id_rayon','id_spp', 'bulan', 'total_tunggakan','sisa_tunggakan','sisa_bulan'];
}
