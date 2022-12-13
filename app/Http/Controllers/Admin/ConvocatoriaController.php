<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use App\Models\Empresa;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')) {
             $convocatorias = Region::select('convocatorias.*', 'regions.nombre')
             ->join('convocatorias', 'regions.id', '=', 'convocatorias.region_id')->groupBy('convocatorias.id')->get();
        } else {
            $convocatorias = Region::select('convocatorias.*', 'regions.nombre', 'users.name')
            ->join('users', 'regions.id', 'users.region_id')
            ->join('convocatorias', 'regions.id', '=', 'convocatorias.region_id')
            ->where('regions.id', auth()->user()->region_id)->groupBy('convocatorias.id')->get();
        }
        return view('admin.convocatorias.index', compact('convocatorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
    
        $regiones = Region::pluck('nombre', 'id'); 
        return view('admin.convocatorias.create',compact('regiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'cantidad' => 'required',
            'email' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required',
            'region_id' => 'required',
            // 'fecha_bases' => 'required',
            // 'fecha_consulta' => 'required',
            // 'fecha_propuestas' => 'required',
            // 'fecha_fin' => 'required',
            // 'alcance' => 'required',
            // 'tdr_url' => 'required',
            // 'proceso_url' => 'required',
            // 'resultado_url' => 'required',
        ]);

        if(Auth::user()->hasRole('Admin')){
            $region_id = $request->region_id;
        }else {
            $region_id = auth()->user()->region_id;
        }
        
        $convocatoria = Convocatoria::create([
            'titulo' => $request->titulo,
            'cantidad' => $request->cantidad,
            'email' => $request->email,
            'estado' => $request->estado,
            'adjudicado' => '',
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_bases' => $request->fecha_bases,
            'fecha_consulta' => $request->fecha_consulta,
            'fecha_propuestas' => $request->fecha_propuestas,
            'fecha_fin' => $request->fecha_fin,
            'alcance' => $request->alcance,
            'tdr_url' => $request->tdr_url,
            'proceso_url' => $request->proceso_url,
            'resultado_url' => $request->resultado_url,
            'slug' => Str::slug($request->titulo),
            'region_id' => $region_id,
            'user_id' => auth()->user()->id,
        ]);

        $convocatoria->slug = $convocatoria->slug.'-'.$convocatoria->id;
        $convocatoria->save();

        return redirect()->route('admin.convocatorias.index')->with('info', 'Convocatoria creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Convocatoria $convocatoria)
    {
        $empresas = Empresa::where('convocatorias_id', $convocatoria->id)->get();
        return view('admin.empresas.index', compact('empresas', 'convocatoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Convocatoria $convocatoria)
    {
        $empresas = Empresa::where('convocatorias_id', $convocatoria->id)->pluck('nombre_empresa', 'nombre_empresa')->toArray();
        return view('admin.convocatorias.edit', compact('convocatoria', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convocatoria $convocatoria)
    {
        $request->validate([
            'titulo' => 'required',
            'cantidad' => 'required',
            'email' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'required',
            // 'fecha_bases' => 'required',
            // 'fecha_consulta' => 'required',
            // 'fecha_propuestas' => 'required',
            // 'fecha_fin' => 'required',
            // 'alcance' => 'required',
            // 'tdr_url' => 'required',
            // 'proceso_url' => 'required',
            // 'resultado_url' => 'required',
        ]);

        
   

        $convocatoria->titulo = $request->titulo;
        $convocatoria->cantidad = $request->cantidad;
        $convocatoria->email = $request->email;
        $convocatoria->estado = $request->estado;
        if($request->adjudicado) {
            $convocatoria->adjudicado = $request->adjudicado;
        } else {
            $convocatoria->adjudicado = '';
        }
        $convocatoria->fecha_inicio = $request->fecha_inicio;
        $convocatoria->fecha_bases = $request->fecha_bases;
        $convocatoria->fecha_consulta = $request->fecha_consulta;
        $convocatoria->fecha_propuestas = $request->fecha_propuestas;
        $convocatoria->fecha_fin = $request->fecha_fin;
        $convocatoria->alcance = $request->alcance;
        $convocatoria->tdr_url = $request->tdr_url;
        $convocatoria->proceso_url = $request->proceso_url;
        $convocatoria->resultado_url = $request->resultado_url;
        $convocatoria->save();

        return redirect()->route('admin.convocatorias.index')->with('info', 'Convocatoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convocatoria $convocatoria)
    {
        $convocatoria->delete();
        return redirect()->back()->with('info', 'Convocatoria eliminada con éxito');
    }
}
