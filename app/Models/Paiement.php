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
}
