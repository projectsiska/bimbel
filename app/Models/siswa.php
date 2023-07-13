<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'nama_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin', 
        'agama', 
        'alamat', 
        'email', 
        'telepon', 
        'asal_sekolah',  
        'foto',  
    ];

    public function scopeFilter($query)
    {
          if(request('search')) {
            $query->where('nama','like', '%'. request('search').'%') 
                  ->orwhere('tempat_lahir','like', '%'. request('search').'%')
                  ->orwhere('tanggal_lahir','like', '%'. request('search').'%')
                  ->orwhere('jenis_kelamin','like', '%'. request('search').'%')
                  ->orwhere('agama','like', '%'. request('search').'%')
                  ->orwhere('pendidikan_terakhir','like', '%'. request('search').'%')
                  ->orwhere('jurusan','like', '%'. request('search').'%')
                  ->orwhere('tahun','like', '%'. request('search').'%')
                  ->orwhere('univ','like', '%'. request('search').'%')
                  ->orwhere('email','like', '%'. request('search').'%')
                  ->orwhere('alamat','like', '%'. request('search').'%') 
                  ->orwhere('telepon','like', '%'. request('search').'%') 
                
            ;
        }
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    
     
    public function kelas()
    {
        return $this->hasone(kelas::class);
    }
    
      
    
    public function sertifikat()
    {
        return $this->hasMany(sertifikat::class);
    }

    
    public function absen()
    {
        return $this->belongsTo(absen::class);
    }

 

    public function absen_masuk()
    {
        return $this->belongsTo(absen_masuk::class);
    }

    public function siswa_nilai()
    {
        return $this->hasMany(siswa_nilai::class);
    }
 
    
    public function getRouteKeyName()
    {
        return 'id';
    }
}
