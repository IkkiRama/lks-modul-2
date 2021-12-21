<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            $data =  $query->where("name", "like", "%" .$search."%");
            return $data;
        });
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
