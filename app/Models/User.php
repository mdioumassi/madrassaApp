<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\CivilitySelect;
use App\Enums\TypeUserSelect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mockery\Matcher\Type;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    const PARENT = 'parent';
    const PROFESSEUR = 'professeur';
    const ADMIN = 'admin';
    const WEBMASTER = 'webmaster';
    const ENFANT = 'enfant';
    const ADULTE = 'adulte';


    public function children(): HasMany
    {
        return $this->hasMany(Child::class, 'parent_id');
    }

    public function levels(): HasMany
    {
        return $this->hasMany(Level::class, 'teacher_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'adult_id');
    }

    public function getUserType(): string
    {
        return $this->type->value ?? '';
    }

    public function getFullNameAttribute(): string
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->civility === 'Mr') {
            return $this->avatar ? asset('avatars/' . $this->avatar) : asset('images/homme.png');
        }
        if ($this->civility === 'Mme') {
            return $this->avatar ? asset('avatars/' . $this->avatar) : asset('images/femme.png');
        }
    }

    public function isEmailExist(string $email): bool
    {
        return $this->where('email', $email)->exists();
    }

    public function isPhoneExist(string $phone): bool
    {
        return $this->where('phone', $phone)->exists();
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'civility',
        'phone',
        'full_address',
        'function',
        'type',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
            'civilily' => CivilitySelect::class,
            'type' => TypeUserSelect::class,
        ];
    }
}
