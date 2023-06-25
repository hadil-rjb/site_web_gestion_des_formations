<?php

namespace App\Models;

use App\Models\Cabinet;
use App\Models\Planning;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CahierDeCharge extends Model
{
    use HasFactory;
    protected $fillable = ['domaine','themes','recommandations','mode','duree','date','personnel','profil'];

    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }

    public function cabinets()
    {
        return $this->belongsToMany(Cabinet::class);
    }
}
