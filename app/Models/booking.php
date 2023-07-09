<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon; 

class pembayaran extends Model
{
     use HasFactory; 


    protected $guarded= ['id'];  
    protected $with= ['siswa'];   

   /*  public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    } */


   /*  public function getTglpembayaranAttribute(){
        return Carbon::parse($this->attributes['tgl_pembayaran'])->translatedFormat('l, d F Y');
    } */
    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }


      public function biaya()
    {
        return $this->belongsTo(biaya::class);
    }


      public function scopeFilter($query, array $filters)
    {
 

        $query->when($filters['search'] ?? false, function($query, $search){

            return $query->where('id','like', '%'. $search.'%')
                         ->orwhere('siswa_id','like', '%'. $search.'%')
                         ->orwhere('biaya_id','like', '%'. $search.'%')
                         ->orwhere('tgl_pembayaran','like', '%'. $search.'%')
                         ->orwhere('jam_pembayaran','like', '%'. $search.'%')
                         ->orwhere('total_biaya','like', '%'. $search.'%')
                         ->orwhere('bukti','like', '%'. $search.'%')
                         ->orwhere('status','like', '%'. $search.'%') 
                         ;
        });

        $query->when($filters['pembayaran'] ?? false, function($query, $pembayaran){
            return $query->whereHas('pembayaran', function($query) use ($pembayaran) {
                         $query->where('slug', $pembayaran);
                         
            });
        });

    }

   

    public function getRouteKeyName()
    {
        return 'id';
    }   

    public function search()
    {
        $name = Input::get('character');
        $searchResult = Player::where('name', '=', $name)->paginate(1);
        return View::make('search.search')
                ->with('name', $name)
                ->with('searchResult', $searchResult);
    }

}