<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registration extends Model
{
    use HasFactory;

    public function Child(): HasOne
    {
        return $this->hasOne(Child::class);
    }

    public function Level(): HasOne
    {
        return $this->hasOne(Level::class);
    }

    public function Adult(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function Course(): HasOne
    {
        return $this->hasOne(Course::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'child_id',
        'level_id',
        'adult_id',
        'course_id',
        'registration_date',
        'payment_date',
        'payment_amount',
        'payment_method',
        'payment_comment',
        'payment_status',
        'registration_status'
    ];
}
