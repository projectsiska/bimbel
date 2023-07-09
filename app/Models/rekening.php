<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class rekening extends Model
{
    use HasFactory;
     


    protected $guarded= ['id'];  

    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class);
    }

     public function scopeFilter($query, array $filters)
    {

   


        $query->when($filters['search'] ?? false, function($query, $search){

            return $query->where('id','like', '%'. request('search').'%')
                          ->orwhere('bank','like', '%'. request('search').'%')
                          ->orwhere('atas_nama','like', '%'. request('search').'%')
                          ->orwhere('rekening','like', '%'. request('search').'%') 
                          ->orwhere('foto_bank','like', '%'. request('search').'%')
                        ;
        });

        $query->when($filters['rekening'] ?? false, function($query, $rekening){
            return $query->whereHas('rekening', function($query) use ($rekening) {
                         $query->where('slug', $rekening);
                         
            });
        });

       

    }

    

}
