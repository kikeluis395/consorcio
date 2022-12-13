<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function empresa()
    {
        return $this->hasMany('App\Models\Empresa');
    }
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
