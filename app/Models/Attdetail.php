<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attdetail extends Model
{
    use HasFactory;

    use HasFactory;
    protected $dates = ['updated_at'];
    protected $guarded = ['id'];

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            $data =  $query->whereHas("user",function ($query) use($search)
            {
                $query->where("name", "like", "%". $search ."%");
            })->orWhere("attstatus", "like", "%" .$search."%");

            return $data;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

}
