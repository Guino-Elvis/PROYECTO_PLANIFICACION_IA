<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
   use HasFactory;
    
    protected $fillable = [
        'description',
    ];

    //Relación de * a *
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_benefits');
    }
}
