<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant_Member extends Model
{
    use HasFactory;

    protected $table = 'grant_members';

    protected $fillable = [
        'grant_id',
        'academician_id',
        'role',
    ];
}