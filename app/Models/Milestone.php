<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    protected $table = 'milestones';

    protected $primaryKey = 'id';

    protected $fillable = [
        'grant_id', 'milestone_name', 'target_completion_date', 'status', 'deliverable', 'remarks', 'date_updated', 'completed_date'
    ];

    // Relationship: A Milestone belongs to a Grant
    public function grant()
    {
        return $this->belongsTo(Grant::class,'grant_id');
    }
}