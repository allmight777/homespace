<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'user_id',
        'montant',
        'status',
        'transaction_id',
        'apartment_id',
        'description',
    ];

    protected $attributes = [
        'status' => 'en_attente',
        'montant' => 100,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
