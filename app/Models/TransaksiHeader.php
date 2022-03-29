<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHeader extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
