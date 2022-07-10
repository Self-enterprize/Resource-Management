<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OccupantPosition extends Model
{
    protected $fillable = [
        'position_id', 'occupant_id', 'starting_date',
        'ending_date'
    ];

    public function occupant() {
        $this->belongsTo('\App\Models\User', 'occupant_id');
    }

    public function position() {
        $this->belongsTo('\App\Models\Position', 'position_id');
    }
}
