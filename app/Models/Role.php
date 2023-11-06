<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'ROLE_ID';

    protected $fillable = [
        'ROLE_NAME'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'USER_ROLE');
    }
}
