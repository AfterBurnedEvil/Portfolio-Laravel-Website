<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
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

Route::get('/home', function () {
    return redirect('/');
})->name('home');  

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard/skills', [SkillController::class, 'index'])->name('skillz_show');
    Route::get('/dashboard/skills/view/{id}', [SkillController::class, 'viewskill'])->name('skille_view');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dboard');

    Route::get('/dashboard/bio', [BioController::class, 'index'])->name('dbio');

    Route::get('/dashboard/project/create', [ProjectController::class, 'createproj'])->name('proj_create');
    Route::get('/project/', [ProjectController::class, 'index'])->name('project_view');
    Route::get('/project/editnow/{id}',[ProjectController::class,'editview'])->name('project_editview');

    Route::resource('qbio', BioController::class);

});

Route::group(['middleware' => ['auth','isAdmin']], function() {


    
    
    Route::post('/dashboard/skills/store', [SkillController::class, 'store'])->name('skillz_store');
    
    Route::delete('/dashboard/skills/des/{id}', [SkillController::class, 'destroy'])->name('skillz_destroy');
    Route::post('/dashboard/skills/mystore', [SkillController::class, 'mystore'])->name('myskillz_store');
    

    Route::post('/dashboard/project/store', [ProjectController::class, 'store'])->name('project_store');
    
    Route::post('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project_edit');
    
    Route::post('/project/delete/{id}',[ProjectController::class,'delete'])->name('project_delete');

    Route::get('/message/',[MessageController::class,'viewall'])->name('message_viewall');
    Route::post('/message/delete/{id}',[MessageController::class,'delete'])->name('message_delete');

    Route::post('/dashboard/editbio/{id}', [BioController::class, 'update'])->name('dbio_updatez');
});

Route::get('/project/view/{id}', [ProjectController::class, 'viewproj'])->name('project_viewspecific');

Route::post('/message/send/', [MessageController::class, 'sendmessage'])->name('send_message');


Route::get('/test', function () {
    return view('homee.test');
})->middleware('isAdmin');;

