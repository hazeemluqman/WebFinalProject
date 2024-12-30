<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;

    protected $table = 'grants';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'grant_amount', 'grant_provider', 'start_date', 'duration_months', 'project_leader_id'
    ];

    // Relationship: A Grant belongs to a Project Leader (Academician)
    public function projectLeader()
    {
        return $this->belongsTo(Academician::class, 'project_leader_id');
    }

    // Relationship: A Grant can have many Grant Members
    public function members()
    {
        return $this->belongsToMany(Academician::class, 'grant_members', 'grant_id', 'academician_id')
                    ->withPivot('role_in_grant');
    }

    // Relationship: A Grant can have many Milestones
    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    // In Grant.php model
    public function academician()
    {
        return $this->belongsTo(Academician::class, 'project_leader_id'); 
    }

    public function grantMembers()
{
    return $this->hasMany(Grant_Member::class);
}


}