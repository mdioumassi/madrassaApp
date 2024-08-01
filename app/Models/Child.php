<?php

namespace App\Models;

use App\Enums\GenreSelect;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Child extends Model
{
    use HasFactory;

    public function parent() : BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function registration(): HasOne
    {
        return $this->hasOne(Registration::class, 'child_id');
    }

    public function getFullNameAttribute(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function getCourseRegistration($id): Registration
    {
        return Registration::where('child_id', $id)->first();
    }

    public function is_registered($id): bool
    {
        return Registration::where('child_id', $id)->exists();
    }

    public function getGenre(): string
    {
        if ($this->genre->value === 'garçon') return '<i class="fa fa-male w3-text-yellow" style="font-size:30px"></i>';
        if ($this->genre->value === 'fille') return '<i class="fa fa-female w3-text-pink" style="font-size:30px"></i>';
    }

    public function getPhotoUrlAttribute()
    {
        if ($this->genre->value === 'garçon') {
            return $this->photo ? asset('photos/' . $this->photo) : asset('images/children/garcon.jpeg');
        }

        if ($this->genre->value === 'fille') {
            return $this->photo ? asset('photos/' . $this->photo) : asset('images/children/fille.png');
        }
    }

    public function isExist($fisrtname, $lastname, $parentId): bool
    {
        return Child::join('users', 'children.parent_id', '=', 'users.id')
            ->where('children.firstname', $fisrtname)
            ->where('children.lastname', $lastname)
            ->where('children.parent_id', $parentId)
            ->exists();
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
        'french_class',
        'status',
        'photo',
    ];

    protected function casts(): array
    {
        return [
            'genre' => GenreSelect::class
        ];
    }
}
