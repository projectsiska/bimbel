<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory; 


    protected $fillable = [
        'kelas_id', 
        'judul',
        'tutup_absen', 
    ];
    

    public function siswa() 
    { 
        return $this->hasMany(siswa::class); 
    } 



    public function guru() 
    { 
        return $this->belongsTo(guru::class); 
    } 

    public function kelas() 
    { 
        return $this->belongsTo(kelas::class); 
    } 

    public function rekap_absen() 
    { 
        return $this->belongsTo(rekap_absen::class); 
    } 

 
}
