<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'status',
        'priority',
        'last_message_at',
    ];

    protected $casts = [
        'last_message_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class)->orderBy('created_at', 'asc');
    }

    public function latestMessage()
    {
        return $this->messages()->latest()->first();
    }

    public function unreadMessagesForAdmin()
    {
        return $this->messages()->where('is_admin', false)->whereNull('read_at')->count();
    }

    public function unreadMessagesForUser()
    {
        return $this->messages()->where('is_admin', true)->whereNull('read_at')->count();
    }

    public function markMessagesAsRead($isAdmin = false)
    {
        $this->messages()
            ->where('is_admin', !$isAdmin)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }
}
