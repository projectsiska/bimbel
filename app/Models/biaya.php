<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class biaya extends Model
{ 
    use HasFactory; 

    protected $guarded= ['id'];  

    
  public function scopeFilter($query)
  {
        if(request('search')) {
          $query->where('harga','like', '%'. request('search').'%') 
                ->orwhere('keterangan','like', '%'. request('search').'%')
               
          ;
      }
  }

    public function getRouteKeyName()
  {
      return 'id';
  }

}
