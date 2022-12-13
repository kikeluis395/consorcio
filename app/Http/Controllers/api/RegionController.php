<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request) {
        $region = Region::where('nombre', $request->region)->get();
        $convocatorias = Convocatoria::where('region_id', $region[0]->id)->get();
        return response()->json(compact('convocatorias'));
    }
}
