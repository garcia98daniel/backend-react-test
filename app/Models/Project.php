<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Constructor;
use App\Models\InterestedUser;

class Project extends Model
{
    use HasFactory;
    public function constructors(){
        return $this->belongsTo(Constructor::class, 'constructors_id', 'id');
    }
    public function interestedPeople(){
        return $this->hasMany(InterestedUser::class, 'projects_id', 'id');
    }
    protected $fillable = [
        'id',
        'name',
        'address',
        'constructors_id',
        'contact',
    ];
}
