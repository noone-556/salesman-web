<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Followup extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'car',
        'due_date',
        'urgent',
        'completed',
    ];

    protected $casts = [
        'due_date' => 'date',
        'urgent' => 'boolean',
        'completed' => 'boolean',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Matches your dashboard's "followups_due" stat
    public function scopeDue($query)
    {
        return $query->where('completed', false)
                      ->whereDate('due_date', '<=', now());
    }

    public function scopeUrgent($query)
    {
        return $query->where('urgent', true);
    }
}