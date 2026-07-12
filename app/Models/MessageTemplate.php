<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'key',
        'label',
        'message',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Renders {{name}}, {{car}} placeholders with real values
    public function render(array $replacements): string
    {
        $message = $this->message;

        foreach ($replacements as $key => $value) {
            $message = str_replace('{{' . $key . '}}', $value, $message);
        }

        return $message;
    }

    // Scope for global (non-user-specific) default templates
    public function scopeGlobal($query)
    {
        return $query->whereNull('user_id');
    }
}