<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'car',
        'status',
        'last_contact_at',
    ];

    protected $casts = [
        'last_contact_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function followups(): HasMany
    {
        return $this->hasMany(Followup::class);
    }

    // Convenience scopes matching your dashboard's "active_leads" stat
    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'cold');
    }

    public function scopeHot($query)
    {
        return $query->where('status', 'hot');
    }
}