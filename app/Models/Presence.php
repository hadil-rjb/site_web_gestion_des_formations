<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Planning;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;
    protected $fillable = ['date','presence','note'];

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }
    public function formations()
    {
        return $this->belongsTo(Formation::class);
    }
    public function plannings()
    {
        return $this->belongsTo(Planning::class);
    }
}
