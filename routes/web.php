<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminInscriptionController;
use App\Http\Controllers\CodeInscriptionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupInscriptionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SimpleInscriptionController;
use App\Http\Controllers\UserDataController;
use App\Models\Code;
use App\Models\GroupInscription;
use App\Models\Inscription;
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



/** Vistas */
//HOME PAGE
Route::get('/', function(){    
    return view('home');
});


// Formularios
/** Inscripción Simple */
Route::get('/simple_inscription',[SimpleInscriptionController::class,'simpleInscription']); 
/** Inscripción Grupal */
Route::get('/group_inscription',[GroupInscriptionController::class,'groupInscription']);
/** Inscripción Simple con código de invitación */
Route::get('/code_inscription/{id}/{group_inscription_id}/{code}',[CodeInscriptionController::class,'codeInscription']);
/** Inscripción grupal, administración de invitaciones */
Route::get('/admin_group_inscription/{group_inscription_id}/{code}',[InscriptionController::class,'adminCodeInscription']);



// Procesamiento de formulario
/** Guardar inscripción simple */
Route::post('/store_inscription',[SimpleInscriptionController::class,'simpleInscriptionStore']);
/** Guardar inscripción grupal y reenvío al sitio de administración de códigos de invitación */
Route::post('/store_group_inscription',[GroupInscriptionController::class,'groupInscriptionStore']);
/** Guardar incripción con código */
Route::post('/store_code_inscription',[CodeInscriptionController::class,'codeInscriptionStore']);
/** Envío de invitación */
Route::post('/send_inscripton',[InscriptionController::class,'sendInscription']);
/** Formulario de contacto */
Route::post('/contact',[ContactController::class,'contact']); 
/**Eliminar un código */
Route::post('/code/{id}/delete',[GroupInscriptionController::class,'deleteCode']);

/** Acreditación */
Route::get('/attendance/{inscription_id}/{token}', [InscriptionController::class, 'attendance']);

/** Certificados */
Route::get('/inscription/certificateRecoveryMail', [InscriptionController::class,'certificateRecovery']);
Route::post('/inscription/certificateRecoveryMail', [InscriptionController::class,'certificateRecoveryMail'])->name('inscription.certificateRecoveryMail');
Route::get('/certificate/{inscription}/{token}', [InscriptionController::class, 'certificate']);

/** Aux function */
Route::get('/admin/group_insc', [AdminController::class,'groupInsc'])->middleware('auth');;
Route::get('/admin/resend_qr/{id}', [AdminController::class,'resendQr'])->middleware('auth');;
Route::post('/admin/attendance', [AdminController::class,'manualAttendance'])->middleware('auth');;

// Route::resource('/inscription', InscriptionController::class);
Route::resource('/admin/', AdminController::class)->middleware('auth');
Route::resource('/admin/inscription', AdminInscriptionController::class)->middleware('auth');
Route::resource('/admin/user_data', UserDataController::class)->middleware('auth');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::get('/mail/inscription', function(){
    $inscription = Inscription::findOrFail(1);
    return view('emails.facetoface')
    ->with('inscription', $inscription);
});

Route::get('/mail/group_inscription', function(){
    $group_inscription = GroupInscription::findOrFail(1);
    return view('emails.group_inscription')
    ->with('group_inscription', $group_inscription);
});

Route::get('/mail/code_inscription', function(){
    $code = Code::FindOrFail(1);
    return view('emails.code_inscription')
    ->with('code', $code);
});

Route::get('/admin/mail/inscription', function(){
    $inscription = Inscription::findOrFail(1);
    return view('emails.admin.inscription')
    ->with('inscription', $inscription);
});

Route::get('/admin/mail/group_inscription', function(){
    $group_inscription = GroupInscription::findOrFail(1);
    return view('emails.admin.group_inscription')
    ->with('group_inscription', $group_inscription);
}); */
