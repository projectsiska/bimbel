<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 
 

class User extends Authenticatable
{
      use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'level',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     protected $guarded=['id'];

     public function scopeFilter($query)
    {
          if(request('search')) {
            $query->where('nama','like', '%'. request('search').'%')
                  ->orwhere('email','like', '%'. request('search').'%')
                  ->orwhere('level','like', '%'. request('search').'%')
                  ->orwhere('username','like', '%'. request('search').'%')
                
            ;
        }
    }

    public function siswa()
    {
        return $this->hasOne(siswa::class);
    }

    public function guru()
    {
        return $this->hasOne(guru::class);
    }

        public function admin()
    {
        return $this->hasOne(admin::class);
    }

    public function notif_pembayaran()
    {
        return pembayaran::where('status', 'Menunggu Konfirmasi')->orderBy('created_at', 'desc')->get();
    }
}
