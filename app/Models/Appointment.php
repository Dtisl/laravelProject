<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'master_id',
        'date',
        'time',
        'busy',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function master(): BelongsTo
    {
        return $this->belongsTo(Master::class);
    }
}
