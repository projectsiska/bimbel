<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 
        'rekening_id',
        'biaya',
        'bukti',
        'status',  
    ];

    public function scopeFilter($query)
    {
          if(request('search')) {
            $query->where('siswa_id','like', '%'. request('search').'%') 
                  ->orwhere( 'rekening_id','like', '%'. request('search').'%')
                  ->orwhere('jumlah','like', '%'. request('search').'%')
                  ->orwhere('bukti','like', '%'. request('search').'%')
                  ->orwhere('status','like', '%'. request('search').'%') 
            ;
        }
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }

     
    public function kelas()
    {
        return $this->hasMany(kelas::class);
    }

    public function rekening()
    {
        return $this->belongsTo(rekening::class);
    }
 
    
    public function getRouteKeyName()
    {
        return 'id';
    }
}
