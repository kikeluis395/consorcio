<?php

namespace App\Http\Controllers;

use App\Mail\RegistroExitoso;
use App\Models\Convocatoria;
use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class InscripcionController extends Controller
{
    public function registro(Request $request)
    {
        // $idconvocatoria = $_GET['idconvocatoria'];
        $convocatoria = Convocatoria::find($request->id);
        return view('registro', compact('convocatoria'));
    }
    public function inscripcion(Request $request) {


        $company = Empresa::where('ruc',$request->ruc)->where('convocatorias_id',$request->convocatorias_id)->get();

        if(count($company) >= 1 ){
            
            return  Redirect::back()->withErrors(["company"=>"La empresa con RUC ".$request->ruc." ya se encuentra participando de esta licitación."]);
        }
      

        //validar datos
        $request->validate([
            'nombre_empresa' => 'required|min:5',
            'razon_social' => 'required|min:5',
            'ruc' => 'required|max:11|min:11',
            'direccion' => 'required',
            'contacto_nombre' => 'required',
            'contacto_cargo' => 'required',
            'contacto_telefono' => 'required', //'required|digits:7'
            'contacto_correo' => 'required',
            'anios_experiencia' => 'required',
        ]);
        
        

        
        //RUC son numeros de 11 digitos
        //archivos tipo pdf o excel word
        //nombre de empresa minimo 5 letras
        //textos minimo 3 letras
        //telefono 7 digitos


        // rename filename pdf =  brochure- id_convocatoria + id_empresa ;

        $empresa = Empresa::create([
            'nombre_empresa' => $request->nombre_empresa,
            'razon_social' => $request->razon_social,
            'ruc' => $request->ruc,
            'direccion' => $request->direccion,
            'pagina_web' => $request->pagina_web,
            'contacto_nombre' => $request->contacto_nombre,
            'contacto_cargo' => $request->contacto_cargo,
            'contacto_telefono' => $request->contacto_telefono,
            'contacto_correo' => $request->contacto_correo,
            'anos_experiencia' => $request->anios_experiencia,
            'convocatorias_id' => $request->convocatorias_id,
        ]);
        //arreglo donde se guardaran los archivos que el usuario agregue
        $archivos = [];

        if ($request->file('brochure_url')) {
            $brochure = $request->file('brochure_url')->store('public/brochures');
            $brochure_url = Storage::url($brochure);
            array_push($archivos, $request->file('brochure_url'));
        } else {
            $brochure_url = "";
        }

        if ($request->file('sustento_experiencia_url')) {
            $sustento_experiencia = $request->file('sustento_experiencia_url')->store('public/sustentos');
            $sustento_experiencia_url = Storage::url($sustento_experiencia);
            array_push($archivos, $request->file('sustento_experiencia_url'));
        } else {
            $sustento_experiencia_url = "";
        }

        if ($request->file('facturacion_2020_url')) {
            $facturacion_2020 = $request->file('facturacion_2020_url')->store('public/facturaciones');
            $facturacion_2020_url = Storage::url($facturacion_2020);
            array_push($archivos, $request->file('facturacion_2020_url'));
        } else {
            $facturacion_2020_url = "";
        }
        if ($request->file('reporte_central_url')) {
            $reporte_central = $request->file('reporte_central_url')->store('public/reportes');
            $reporte_central_url = Storage::url($reporte_central);
            array_push($archivos, $request->file('reporte_central_url'));
        } else {
            $reporte_central_url = "";
        }


        $empresa->brochure_url = $brochure_url;
        $empresa->sustento_experiencia_url = $sustento_experiencia_url;
        $empresa->facturacion_2020_url = $facturacion_2020_url;
        $empresa->reporte_central_url = $reporte_central_url;
        $empresa->fecha_registro = Carbon::parse($empresa->created_at)->format('d-m-Y');
        $empresa->save();
        $empresa->archivos = $archivos;

        Mail::to($empresa->contacto_correo)->cc('kikeluis395@gmail.com')->send(new RegistroExitoso($empresa));

        $convocatoria = Convocatoria::find($request->convocatorias_id);
        if($convocatoria->region->paquete->nombre =='Paquete 6') {
            return redirect('/paquete6/convocatoria/'.$convocatoria->slug)->with('message' , 'Su empresa ha sido registrada correctamente');
        } else {
            return redirect('/paquete5/convocatoria/'.$convocatoria->slug)->with('message' , 'Su empresa ha sido registrada correctamente');
        }

    }
}
