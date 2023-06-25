<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\Planning;
use App\Models\Presence;
use App\Models\Formateur;
use App\Models\Evaluation;
use App\Models\CahierDeCharge;
use App\Models\EvaluationFroid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['titre','duree','budget','date'];

    public function plannings()
    {
        return $this->belongsTo(Planning::class);
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function demandes()
    {
        return $this->belongsToMany(Demande::class);
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }

    public function cahierDeCharge()
    {
        return $this->belongsTo(CahierDeCharge::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function evaluation_froids()
    {
        return $this->hasMany(EvaluationFroid::class);
    }
}
