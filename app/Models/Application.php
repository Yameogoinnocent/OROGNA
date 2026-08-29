<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    protected $fillable = [
        'job_offer_id',
        'user_id',
        'candidate_name',
        'candidate_email',
        'phone',
        'city',
        'cv_path',
        'cover_letter_path',
        'message',
        'status',
        'admin_notes',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    public function jobOffer(): BelongsTo
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}