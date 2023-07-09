<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa_nilai extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nilai_id', 
        'siswa_id', 
        'nilai', 
    ];
    

    public function siswa() 
    { 
        return $this->belongsTo(siswa::class); 
    } 
 

    public function nilai() 
    { 
        return $this->belongsTo(nilai::class); 
    } 
 
}
