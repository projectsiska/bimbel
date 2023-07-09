<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikat extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'siswa_id', 
        'sertifikat', 
    ];
    
    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }
}
