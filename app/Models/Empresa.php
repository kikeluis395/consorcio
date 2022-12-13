<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    const DEFAULT = 2;
    const SI = 1;
    const NO = 0;

    protected $guarded = [
        'id'
    ];
    
    public function convocatoria()
    {
        return $this->belongsTo('App\Models\Convocatoria', 'convocatorias_id');
    }
}
