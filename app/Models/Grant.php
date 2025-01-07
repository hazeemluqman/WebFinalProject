<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = [
        'title', 'grant_amount', 'grant_provider', 'start_date', 'duration_months','description', 'project_leader_id'
    ];
    public function academicians()
{
    return $this->belongsToMany(Academician::class, 'grant_members')
                ->withPivot('role')  // Include the pivot field for 'role'
                ->withTimestamps();  // Optional, if you have timestamps in the pivot table
}


    public function leader(){
        return $this->academicians()->wherePivot('role','leader')->first();
    }

    public function milestones(){
        return $this->hasMany(Milestone::class);
    }

}