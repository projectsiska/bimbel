<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen_masuk extends Model
{
    use HasFactory; 


    protected $fillable = [
        'absen_id', 
        'siswa_id', 
    ];
    

    public function siswa() 
    { 
        return $this->hasMany(siswa::class); 
    } 



    public function absen() 
    { 
        return $this->belongsTo(absen::class); 
    } 
 

 
}
