<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationFroid extends Model
{
    use HasFactory;
    protected $fillable = [
        'resultat',
        'qualite',
        'competences',
        'productivite',
        'motiviation',
        'esprit',
        'systeme',
        'suggerer',
    ];
}
