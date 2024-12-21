<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Subscription extends Model
{
    use HasFactory;

    // Explicitly define fillable fields
    protected $fillable = [
        'user_id',
        'type',
        'stripe_id',
        'stripe_status',
        'stripe_price',
        'quantity',
        'trial_ends_at',
        'ends_at',
    ];
    protected $casts = [
        'ends_at' => 'datetime', // Ensures ends_at is treated as a Carbon instance
    ];
    // Define the relationship to User model
    public function user()
{
    return $this->belongsTo(User::class);
}

}
