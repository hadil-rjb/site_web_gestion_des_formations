<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating1',
        'observation1',
        'rating2',
        'observation2',
        'rating3',
        'observation3',
        'rating4',
        'observation4',
        'rating5',
        'observation5',
        'rating6',
        'observation6',
        'rating7',
        'observation7',
        'rating8',
        'observation8',
        'reponse',
        'reponse2',
        'reponse3',
        'statut',
    ];

    public function formations()
    {
        return $this->belongsTo(Formation::class);
    }
}
