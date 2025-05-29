<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
  

    protected $fillable = [
        'status',
        'name',
        'monthly_price',
        'description',
        'team_size',
        'premium_support_months',
        'free_updates_months',
    ];

    //Relación de * a *
    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'plan_benefits');
    }
}
