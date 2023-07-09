<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class guru extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id', 
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin', 
        'agama', 
        'alamat', 
        'email', 
        'telepon', 
        'pendidikan_terakhir', 
        'jurusan', 
        'tahun', 
        'univ', 
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

    /* public function gettanggallahirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])
        ->transLatedFormat('d F Y');
    } */
     
    public function kelas()
    {
        return $this->hasOne(kelas::class);
    }
 
    
    public function getRouteKeyName()
    {
        return 'id';
    }
}
