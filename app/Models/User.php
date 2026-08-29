<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CandidateProfile;

#[Fillable(['name', 'email', 'password','role','is_active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

public function applications(): HasMany
{
    return $this->hasMany(Application::class);
}

public function isAdmin(): bool
{
    return $this->role === 'admin';
}

public function isRecruiter(): bool
{
    return $this->role === 'recruteur';
}

public function isCandidate(): bool
{
    return in_array($this->role, ['candidat', 'candidate'], true);
}

public function candidateProfile(): HasOne
{
    return $this->hasOne(CandidateProfile::class);
}

public function candidateMessages(): HasMany
{
    return $this->hasMany(CandidateMessage::class, 'candidate_id');
}
/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }
}

