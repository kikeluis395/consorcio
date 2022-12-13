<?php
namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Empresa;
use Illuminate\Http\Request;


class HomeController extends Controller
{

  public function index() {

    return view('frontend.home');

  }

  public function consorcio() {
    return view('frontend.consorcio');
  }

  public function politica() {
    return view('frontend.politica');
  }


  public function tarcilla(){

    $abiertas = Convocatoria::where('region_id', '1')->where('estado','Abierto')->orderBy('id', 'desc')->get();
    $enprocesos = Convocatoria::where('region_id', '1')->where('estado','En Proceso')->orderBy('id', 'desc')->get();
    $cerradas = Convocatoria::where('region_id', '1')->where('estado','Cerrado')->orderBy('id', 'desc')->get();
    
    return view('frontend.tarcilla', compact(['abiertas','enprocesos','cerradas']));
  }

  public function soterito(){
    $abiertas = Convocatoria::where('region_id', '2')->where('estado','Abierto')->orderBy('id', 'desc')->get();
    $enprocesos = Convocatoria::where('region_id', '2')->where('estado','En Proceso')->orderBy('id', 'desc')->get();
    $cerradas = Convocatoria::where('region_id', '2')->where('estado','Cerrado')->orderBy('id', 'desc')->get();
    return view('frontend.soterito', compact(['abiertas','enprocesos','cerradas']));
  }

  public function paquete5(Request $request){
    $convocatoria = Convocatoria::where('slug',$request->slug)->get();

    $empresas = Empresa::where('convocatorias_id',$convocatoria[0]->id)->orderBy('id', 'desc')->get();
    return view('frontend.convocatoria', compact(['convocatoria','empresas']));

    // return dd($convocatoria[0]->id);
    
  }



  public function ancashcosta(){

    $abiertas = Convocatoria::where('region_id', '3')->where('estado','Abierto')->orderBy('id', 'desc')->get();
    $enprocesos = Convocatoria::where('region_id', '3')->where('estado','En proceso')->orderBy('id', 'desc')->get();
    $cerradas = Convocatoria::where('region_id', '3')->where('estado','Cerrado')->orderBy('id', 'desc')->get();

    return view('frontend.ancashcosta', compact(['abiertas','enprocesos','cerradas']));

    
  }
  public function ancashsierra(){ 

    $abiertas = Convocatoria::where('region_id', '4')->where('estado','Abierto')->orderBy('id', 'desc')->get();
    $enprocesos = Convocatoria::where('region_id', '4')->where('estado','En Proceso')->orderBy('id', 'desc')->get();
    $cerradas = Convocatoria::where('region_id', '4')->where('estado','Cerrado')->orderBy('id', 'desc')->get();
    return view('frontend.ancashsierra', compact(['abiertas','enprocesos','cerradas']));
  }
  public function cajamarca(){

    $abiertas = Convocatoria::where('region_id', '5')->where('estado','Abierto')->orderBy('id', 'desc')->get();
    $enprocesos = Convocatoria::where('region_id', '5')->where('estado','En Proceso')->orderBy('id', 'desc')->get();
    $cerradas = Convocatoria::where('region_id', '5')->where('estado','Cerrado')->orderBy('id', 'desc')->get();
    return view('frontend.cajamarca', compact(['abiertas','enprocesos','cerradas']));
  }
  public function lalibertad(){

    $abiertas = Convocatoria::where('region_id', '6')->where('estado','Abierto')->orderBy('id', 'desc')->get();
    $enprocesos = Convocatoria::where('region_id', '6')->where('estado','En Proceso')->orderBy('id', 'desc')->get();
    $cerradas = Convocatoria::where('region_id', '6')->where('estado','Cerrado')->orderBy('id', 'desc')->get();
    return view('frontend.lalibertad', compact(['abiertas','enprocesos','cerradas']));
  }

  
  public function paquete6(Request $request){
    $convocatoria = Convocatoria::where('slug',$request->slug)->get();
    
    
    $empresas = Empresa::where('convocatorias_id',$convocatoria[0]->id)->orderBy('id', 'desc')->get();
    return view('frontend.convocatoria', compact(['convocatoria','empresas']));
  }



}