<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class kelas extends Model
{ 
    use HasFactory; 

    protected $guarded= ['id'];  

    
  public function scopeFilter($query)
  {
        if(request('search')) {
          $query->where('nama_kelas','like', '%'. request('search').'%') 
                ->orwhere('keterangan','like', '%'. request('search').'%')
               
          ;
      }
  }

  public function guru()
  {
      return $this->belongsTo(guru::class);
  }

  public function siswa()
  {
      return $this->belongsTo(siswa::class);
  }
  

  public function absen()
  {
      return $this->hasMany(absen::class);
  }

  
  public function nilai()
  {
      return $this->hasMany(nilai::class);
  }
 
    public function getRouteKeyName()
  {
      return 'id';
  }

}
