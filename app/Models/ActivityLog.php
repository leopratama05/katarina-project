<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table = "activity_log";

    /**
     * Get the user that owns the ActivityLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }
}
