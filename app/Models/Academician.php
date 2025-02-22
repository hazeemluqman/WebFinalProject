<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    protected $fillable = ['name', 'staff_number', 'email', 'college', 'department', 'position', 'user_id'];

    public function grants()
    {
        return $this->belongsToMany(Grant::class, 'grant_members')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}