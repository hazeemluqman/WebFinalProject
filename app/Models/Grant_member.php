<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant_Member extends Model
{
    use HasFactory;

    protected $table = 'grant_members';

    protected $primaryKey = 'id';

    protected $fillable = [
        'grant_id', 'academician_id', 'role_in_grant'
    ];

    // Relationship: A Grant Member belongs to a Grant
    public function grant()
    {
        return $this->belongsTo(Grant::class);
    }

    // Relationship: A Grant Member belongs to an Academician
    public function academician()
    {
        return $this->belongsTo(Academician::class);
    }
}