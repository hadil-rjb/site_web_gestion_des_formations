<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\Planning;
use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['matricule','name'];

    public function demandes()
    {
        return $this->belongsToMany(Demande::class);
    }

    public function plannings()
    {
        return $this->belongsToMany(Planning::class);
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
