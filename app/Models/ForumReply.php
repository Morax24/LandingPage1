<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumReply extends Model
{
    protected $fillable = [
        'contact_id',
        'parent_id',
        'name',
        'email',
        'message',
        'status',
        'approved_at',
        'approved_by'
    ];

    // Relasi ke contact
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    // Relasi ke parent reply (untuk nested comments)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ForumReply::class, 'parent_id');
    }

    // Relasi ke child replies
    public function replies(): HasMany
    {
        return $this->hasMany(ForumReply::class, 'parent_id')->where('status', 'approved');
    }

    // Relasi ke user yang approve
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Scope untuk reply utama (bukan balasan)
    public function scopeMainReplies($query)
    {
        return $query->whereNull('parent_id');
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
