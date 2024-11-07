<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Master extends Model
{
    /** @use HasFactory<\Database\Factories\MasterFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_masters');
    }
    
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
