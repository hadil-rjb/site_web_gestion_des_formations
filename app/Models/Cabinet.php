<?php

namespace App\Models;

use App\Models\Formateur;
use App\Models\CahierDeCharge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabinet extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','phone_number','website'];

    public function formateurs()
    {
        return $this->hasMany(Formateur::class);
    }

    public function cahierdecharges()
    {
        return $this->belongsToMany(CahierDeCharge::class);
    }
}
