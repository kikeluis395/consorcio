<?php
use App\Http\Controllers\api\RegionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/consorcio', [HomeController::class, 'consorcio']);
Route::get('/politica-antifraude', [HomeController::class, 'politica']);

Route::get('/paquete5/tarcilla', [HomeController::class, 'tarcilla']);
Route::get('/paquete5/soterito', [HomeController::class, 'soterito']);
Route::get('/paquete5/convocatoria/{slug}',[HomeController::class, 'paquete5']);


Route::get('/paquete6/ancash-costa', [HomeController::class, 'ancashcosta']);
Route::get('/paquete6/ancash-sierra', [HomeController::class, 'ancashsierra']);
Route::get('/paquete6/cajamarca', [HomeController::class, 'cajamarca']);
Route::get('/paquete6/la-libertad', [HomeController::class, 'lalibertad']);
Route::get('/paquete6/convocatoria/{slug}',[HomeController::class, 'paquete6']);

Route::get('/regiones', [HomeController::class,'regiones']);


Route::get('/storagelink',function(){
 Artisan::call('storage:link');
});










// Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
//     return view('admin/index');
// })->name('admin');

Route::post('registro', [InscripcionController::class, 'inscripcion'])->name('inscripcion.registro');

Route::get('/convocatoria/registro/{id}', [InscripcionController::class, 'registro'])->name('registro');
//api para convocatorias
Route::get('/api/region/{region}', [RegionController::class, 'index']);
