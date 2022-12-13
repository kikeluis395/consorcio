<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if(Auth::user()->hasRole('Admin')) {
            $convocatorias = Convocatoria::all();
        } else {
            $convocatorias = Convocatoria::where('region_id',auth()->user()->region_id)->get();
        }
        return view('admin.index' , compact('convocatorias'));
    }
}
