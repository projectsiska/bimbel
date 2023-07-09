<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'level',
        'email',
        'username', 
        'password', 
    ];

    public function scopeFilter($query)
    {
          if(request('search')) {
            $query->where('name','like', '%'. request('search').'%')
                  ->orwhere('email','like', '%'. request('search').'%')
                  ->orwhere('level','like', '%'. request('search').'%') 
                  ->orwhere('username','like', '%'. request('search').'%') 
                
            ;
        }
    }
 

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    
    public function getRouteKeyName()
    {
        return 'id';
    }
}
