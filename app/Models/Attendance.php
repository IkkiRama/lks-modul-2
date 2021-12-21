<?php

namespace App\Models;

use App\Models\User;
// use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            $data =  $query->whereHas("subject",function ($query) use($search)
            {
                $query->where("name", $search);
            })->orWhereHas("classe",function ($query) use($search)
            {
                $query->where("name", $search);
            })->orWhereHas("user",function ($query) use($search)
            {
                $query->where("name", $search);
            })->orWhere("topic", "like", "%" .$search."%")->orWhere("date", "like", "%" .$search."%");

            return $data;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function attdetail()
    {
        return $this->hasMany(Attdetail::class);
    }
}
