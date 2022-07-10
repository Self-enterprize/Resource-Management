<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id', 'name', 'surname', 'phoneNumber', 'status', 'email','school_id'
    ];

    // Returns the agent who convinced the customer to come.
    public function agent(): BelongsTo
    {
        return $this->belongsTo('\App\Models\User','agent_id');
    }

    // Returns prospect's school.
    public function school(): BelongsTo
    {
        return $this->belongsTo('\App\Models\School', 'school_id');
    }
}
