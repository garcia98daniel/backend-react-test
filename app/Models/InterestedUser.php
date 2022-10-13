<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'projects_id',
        'name',
        'email',
        'contact',
        'date_of_birth',
        'city',
    ];
}
