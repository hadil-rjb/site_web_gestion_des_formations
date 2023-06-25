<?php

namespace App\Models;

use App\Models\User;
use App\Models\Employee;
use App\Models\Planning;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['domaine',
    'themes',
   'objectifs',
    'formateur',
    'priorite',
    'date',
    'statut'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }

}
