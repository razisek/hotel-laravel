<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Manager extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guarded = ['id'];

    public function property()
    {
        return $this->belongsToMany(Property::class, 'property_ownership', 'manager_id', 'property_id');
    }
}
