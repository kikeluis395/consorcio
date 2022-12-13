<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function region()
    {
        return $this->hasMany('App\Models\Region');
    }
}
