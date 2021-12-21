<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            $data =  $query->whereHas("classe",function ($query) use($search)
            {
                $query->where("name", "like", "%". $search ."%");
            })
            ->orWhere("name", "like", "%" .$search."%")
            ->orWhere("role", "like", "%" .$search."%")
            ->orWhere("email", "like", "%" .$search."%");

            return $data;
        });
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function attdetail()
    {
        return $this->hasMany(Attdetail::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
