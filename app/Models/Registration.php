<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registration extends Model
{
    use HasFactory;

    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function adult(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function getPaymentStatus(): string
    {
        if ($this->payment_status === 'paid') return '<span class="w3-tag w3-green w3-round">Payé</span>';
        if ($this->payment_status === 'pending') return '<span class="w3-tag w3-red w3-round">Non payé</span>';
    }

    public function getRegistrationStatus(): string
    {
        if ($this->registration_status === 'registered') return '<span class="w3-tag w3-green w3-round">Inscrit</span>';
        if ($this->registration_status === 'unregistered') return '<span class="w3-tag w3-red w3-round">Non inscrit</span>';
    }

    public function getPaymentMethod(): string
    {
        if ($this->payment_method === 'espece') return '<span class="w3-tag w3-blue w3-round">Espèce</span>';
        if ($this->payment_method === 'cheque') return '<span class="w3-tag w3-yellow w3-round">Chèque</span>';
        if ($this->payment_method === 'virement') return '<span class="w3-tag w3-green w3-round">Virement</span>';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'child_id',
        'level_id',
        'course_id',
        'adult_id',
        'registration_date',
        'payment_date',
        'payment_amount',
        'payment_method',
        'payment_note',
        'payment_status',
        'registration_status'
    ];
}
