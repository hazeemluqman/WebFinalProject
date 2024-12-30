<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = [
        'title', 'grant_amount', 'grant_provider', 'start_date', 'duration_months', 'project_leader_id'
    ];
    public function academicians(){
        return $this->belongsToMany(Academician::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function leader(){
        return $this->academicians()->wherePivot('role','leader')->first();
    }

    public function milestones(){
        return $this->hasMany(Milestone::class);
    }

}