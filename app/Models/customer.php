<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class siswa extends Model
{
    use HasFactory; 

    protected $guarded= ['id'];  

    public function biaya()
    {
        return $this->belongsTo(biaya::class);
    }
    public function pembayaran()
    {
        return $this->belongsTo(pembayaran::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function scopeFilter($query)
    {
          if(request('search')) {
            $query->where('nama_siswa','like', '%'. request('search').'%')
                  ->orwhere('nis','like', '%'. request('search').'%')
                  ->orwhere('jk','like', '%'. request('search').'%')
                  ->orwhere('alamat','like', '%'. request('search').'%')
                  ->orwhere('telepon','like', '%'. request('search').'%')
                  ->orwhere('email','like', '%'. request('search').'%')
                  ->orwhere('nama_ayah','like', '%'. request('search').'%')
                  ->orwhere('nama_ibu','like', '%'. request('search').'%')
                  ->orwhere('biaya_id','like', '%'. request('search').'%')
                  ->orwhere('tahun_masuk','like', '%'. request('search').'%')
                  ->orwhere('status_byr','like', '%'. request('search').'%')
                  ->orwhere('status_siswa','like', '%'. request('search').'%')
            ;
        }
    }

   
}

?>