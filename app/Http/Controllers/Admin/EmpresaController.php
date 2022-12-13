<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Preseleccion;
use App\Mail\Recepcion;
use App\Mail\RegistroExitoso;
use App\Mail\Resultado;
use App\Mail\Seleccion;
use App\Mail\UserCreated;
use App\Models\Convocatoria;
use App\Models\Empresa;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $empresas = Region::select('empresas.*', 'convocatorias.titulo', 'convocatorias.id as convocatoriasId')
                ->join('convocatorias', 'regions.id', '=', 'convocatorias.region_id')
                ->join('empresas', 'convocatorias.id', '=', 'empresas.convocatorias_id')->get();
        } else {
            $empresas = Region::select('empresas.*', 'convocatorias.titulo', 'convocatorias.id as convocatoriasId')
                ->join('convocatorias', 'regions.id', '=', 'convocatorias.region_id')
                ->join('empresas', 'convocatorias.id', '=', 'empresas.convocatorias_id')
                ->where('regions.id', auth()->user()->region_id)->get();
        }

        $convocatorias = Convocatoria::where('region_id', auth()->user()->region_id)->pluck('titulo', 'id')->toArray();
        return view('admin.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('admin.empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function revision(Request $request, Empresa $empresa)
    {
        switch ($request->tipo) {
            case '2':
                $empresa->propuesta_recepcionada = $request->opcion;
                $empresa->save();
                Mail::to($empresa->contacto_correo)->send(new Recepcion($empresa));
                break;
            case '1':
                $empresa->preseleccionado = $request->opcion;
                $empresa->save();
                Mail::to($empresa->contacto_correo)->send(new Preseleccion($empresa));
                break;
            case '3':
                $empresa->seleccionado = $request->opcion;
                $empresa->save();
                Mail::to($empresa->contacto_correo)->send(new Seleccion($empresa));
                break;
            default:
                $empresa->resultado = $request->opcion;
                $empresa->save();
                if($empresa->resultado !== '0') {
                    $empresas = Empresa::where('convocatorias_id', $empresa->convocatorias_id)->get();
                    foreach ($empresas as $e) {
                        if ($e->resultado !== '1') {
                            $e->resultado = '0';
                            $e->save();
                        } else {
                            $convocatoria = Convocatoria::find($empresa->convocatorias_id);
                            $convocatoria->adjudicado = $e->razon_social;
                            $convocatoria->estado = 'Cerrado';
                            $convocatoria->save();
                        }
                        Mail::to($e->contacto_correo)->send(new Resultado($e));
                    }
                }
                break;
        }

        return redirect()->back()->with('info', 'Correo enviado Satisfactoriamente');
    }

    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->back()->with('info', 'Empresa eliminada con éxito');
    }
}
