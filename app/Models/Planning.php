<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\Employee;
use App\Models\Presence;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = ['budget','statut','annee'];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }


    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
