<?php

namespace App\Models;

use App\Models\Cabinet;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Model
{
    use HasFactory;
    protected $fillable = ['name','tel','email','adresse','specialite','experience'];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }
}
