<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    use HasFactory;

    protected $table = 'academicians';

    // Define the primary key
    protected $primaryKey = 'id';

    // Define the columns that are mass assignable
    protected $fillable = [
        'name', 'staff_number', 'email', 'college', 'department', 'position'
    ];

    // Relationship: An Academician can lead many Grants
    public function grantsLed()
    {
        return $this->hasMany(Grant::class, 'project_leader_id');
    }

    // // Relationship: An Academician can be a member of many Grants through Grant Members
    // public function grants()
    // {
    //     return $this->belongsToMany(Grant::class, 'grant_members', 'academician_id', 'grant_id')
    //                 ->withPivot('role_in_grant');
    // }

    // In Academician.php model
    public function grants()
    {
        return $this->hasMany(Grant::class);
    }

    public function grantMembers()
    {
        return $this->hasMany(Grant_Member::class);
    }


}