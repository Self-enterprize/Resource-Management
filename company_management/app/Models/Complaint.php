<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 'message', 'title', 'status'
    ];

    protected $hidden = [
        'sender_id'
    ];

    public function sender(): BelongsTo
    {
        return $this->belongsTo('\App\Models\User', 'sender_id');
    }
}
