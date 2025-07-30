<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logement extends Model
{
    use HasFactory;

    protected $table = 'logements';

  
    protected $fillable = [
        'nom',
        'type',
        'prix',
        'localisation',
        'proprietaire',
        'locataire',
        'genre_locataire',
        'nbr_avance',
        'caution',
        'eau',
        'type_compteur_eau',
        'electricite',
        'type_compteur_electricite',
        'surface',
        'nombre_pieces',
        'meuble',
        'disponibilite',
        'description',
        'type_chauffage',
        'charges',
        'contact_tel',
        'wifi_inclus',
        'photos',       // chemins photos stockés en JSON
        'statut',
    ];

    // Caster les types pour facilité manipulation
    protected $casts = [
        'prix' => 'decimal:2',
        'caution' => 'decimal:2',
        'charges' => 'decimal:2',
        'surface' => 'decimal:2',
        'nbr_avance' => 'integer',
        'nombre_pieces' => 'integer',
        'eau' => 'boolean',
        'electricite' => 'boolean',
        'meuble' => 'boolean',
        'wifi_inclus' => 'boolean',
        'photos' => 'array',
        'disponibilite' => 'date',
    ];



}
