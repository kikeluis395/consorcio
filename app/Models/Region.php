<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
    public function convocatoria()
    {
        return $this->hasMany('App\Models\Convocatoria');
    }

    public function paquete()
    {
        return $this->belongsTo('App\Models\Paquete');
    }
}
