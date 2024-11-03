<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    /** @use HasFactory<\Database\Factories\UserMasterFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'master_id',
    ];
}
