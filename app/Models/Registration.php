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
        if ($this->payment_status === 'paid') return '<span class="badge bg-success">Payé</span>';
        if ($this->payment_status === 'pending') return '<span class="badge bg-danger">Non payé</span>';
    }

    public function getRegistrationStatus(): string
    {
        if ($this->registration_status === 'registered') return '<span class="badge bg-success">Inscrit</span>';
        if ($this->registration_status === 'unregistered') return '<span class="badge bg-danger">En attente</span>';
    }

    public function getPaymentMethod()
    {
        if ($this->payment_method === 'espece') return '<span class="badge bg-primary"><i class="fa fa-money"></i> Espèce</span>';
        if ($this->payment_method === 'cheque') return '<span class="badge bg-primary"><i class="fa-solid fa-money-check-dollar"></i> Chèque</span>';
        if ($this->payment_method === 'virement') return '<span class="badge bg-primary">Virement</span>';
        if ($this->payment_method === 'carte') return '<span class="badge bg-primary"><i class="fa fa-credit-card"></i> Carte bancaire</span>';
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
