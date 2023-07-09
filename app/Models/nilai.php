<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
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

  public function kelas()
  {
      return $this->belongsTo(kelas::class);
  }
  
  
  public function siswa()
  {
      return $this->hasMany(siswa::class);
  }
  

  public function siswa_nilai()
  {
      return $this->hasOne(siswa_nilai::class);
  }


    public function getRouteKeyName()
  {
      return 'id';
  }

}
