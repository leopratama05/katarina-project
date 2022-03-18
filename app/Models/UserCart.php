<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the UserCart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Get all of the comments for the UserCart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relasiCart()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
