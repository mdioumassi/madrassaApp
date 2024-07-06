<?php

namespace App\Models;

use App\Enums\GenreSelect;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Child extends Model
{
    use HasFactory;

    public function parent() : BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class, 'child_id');
    }

    public function getFullNameAttribute(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function getAllCountAttribute(): int
    {
        return $this->count();
    }
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'genre',
        'french_class'
    ];

    protected function casts(): array
    {
        return [
            'genre' => GenreSelect::class
        ];
    }
}
