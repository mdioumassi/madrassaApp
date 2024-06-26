<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Level extends Model
{
    use HasFactory;

   public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subjects() : HasMany
    {
        return $this->hasMany(Subject::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'label',
        'comment',
        'slug',
        'tarif',
        'registration_fees',
        'hours',
    ];
}
