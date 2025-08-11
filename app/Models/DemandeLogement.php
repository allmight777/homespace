<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeLogement extends Model
{
    protected $table = 'demandes_logements';

    protected $fillable = [
        'lieu',
        'type_chambre',
        'electricite',
        'description_electricite',
        'eau',
        'description_eau',
        'nombre_chambres',
        'autres_criteres',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
