<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/caracterizacaoHistorico', function () {
    return view('telasInicio/oTerritorio/caracterizacaoHistorico');
})->name('caracterizacaoHistorico');
|
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('inicio');

Route::get('/politicaTerritorial', [App\Http\Controllers\PoliticaTerritorialController::class, 'index'])->name('politicaTerritorial');

Route::post('/conteudoPost', [App\Http\Controllers\conteudoPostController::class, 'index'])->name('conteudo');

//Route::post('/agenda', [App\Http\Controllers\AgendaTerritorioController::class, 'index'])->name('agenda');

Route::get('/agenda', function () {
    return view('telasInicio/agenda');
})->name('agenda');

Route::get('/caracterizacaoHistorico', [App\Http\Controllers\CaracterizacaoHistoricoController::class, 'index'])->name('caracterizacaoHistorico');

Route::get('/coordenacao', [App\Http\Controllers\CoordenacaoController::class, 'index'])->name('coordenacao');

Route::get('/nucleoDiretivo', [App\Http\Controllers\NucleoDiretivoController::class, 'index'])->name('nucleoDiretivo');

Route::get('/membrosDoTerritorio', [App\Http\Controllers\MembrosDoTerritorioController::class, 'index'])->name('membrosDoTerritorio.index');

Route::get('/municipios', [App\Http\Controllers\MunicipiosController::class, 'index'])->name('municipios.index');

Route::get('/contato', [App\Http\Controllers\ContatosController::class, 'index'])->name('contato');

Route::get('/agendaDoTerritorio', [App\Http\Controllers\AgendaTerritorioController::class, 'index'])->name('agendaDoTerritorio');

Route::get('/projetosDesenvolvimentoRural', [App\Http\Controllers\ProjetosDesenvolvimentoRuralController::class, 'index'])->name('projetosDesenvolvimentoRural');

Route::get('/noticias', [App\Http\Controllers\NoticiasController::class, 'index'])->name('noticias');

Route::get('/documentos', [App\Http\Controllers\DocumentosController::class, 'index'])->name('documentos');

Route::get('/fullCalendar', [App\Http\Controllers\fullCalendarController::class, 'index'])->name('fullCalendar.index');

Route::post('/fullCalendarCadastro', [App\Http\Controllers\fullCalendarController::class, 'store'])->name('fullCalendar.store');

Route::post('/fullCalendarEditar', [App\Http\Controllers\fullCalendarController::class, 'edit'])->name('fullCalendar.edit');

Route::post('/fullCalendarApagar', [App\Http\Controllers\fullCalendarController::class, 'delete'])->name('fullCalendar.delete');

Route::post('/publicarPostagem', [App\Http\Controllers\PostsController::class, 'store'])->name('Posts.store');

Route::post('/editarPostagem', [App\Http\Controllers\PostsController::class, 'update'])->name('Posts.update');

Route::get('/sair', function (Request $request) {
    Auth::logout();
    return redirect('/');
})->name('sair');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/banner', [App\Http\Controllers\bannerController::class, 'index'])->name('banner.index');
    Route::post('/bannerInserir', [App\Http\Controllers\bannerController::class, 'store'])->name('banner.store');
    Route::post('/bannerPublicar', [App\Http\Controllers\bannerController::class, 'publicar'])->name('banner.publicar');

    Route::get('editarConteudoPost', [App\Http\Controllers\PostsController::class, 'edit'])->name('conteudo.edit');
    Route::post('/politicaTerritorialDeletar', [App\Http\Controllers\PoliticaTerritorialController::class, 'delete'])->name('politicaTerritorial.delete');
    Route::post('/noticiaDeletar', [App\Http\Controllers\NoticiasController::class, 'delete'])->name('noticia.delete');
    Route::post('/caracterizaoHistoricoDeletar', [App\Http\Controllers\CaracterizacaoHistoricoController::class, 'delete'])->name('caracterizacaoHistorico.delete');
    Route::post('/coordenacaoDeletar', [App\Http\Controllers\CoordenacaoController::class, 'delete'])->name('coordenacao.delete');
    Route::post('/nucleoDiretivoDeletar', [App\Http\Controllers\NucleoDiretivoController::class, 'delete'])->name('nucleoDiretivo.delete');
    Route::post('/contatoDeletar', [App\Http\Controllers\ContatosController::class, 'delete'])->name('contato.delete');
    Route::post('/documentoDeletar', [App\Http\Controllers\DocumentosController::class, 'delete'])->name('documento.delete');
    Route::post('/agendaDoTerritorioDeletar', [App\Http\Controllers\AgendaTerritorioController::class, 'delete'])->name('agendaDoTerritorio.delete');
    Route::post('/membrosDoTerritorioDeletar', [App\Http\Controllers\MembrosDoTerritorioController::class, 'deletePublicacao'])->name('membrosDoTerritorio.deletePostagem');
    Route::post('/municipiosDeletar', [App\Http\Controllers\MunicipiosController::class, 'deletePublicacao'])->name('municipios.deletePostagem');
    Route::post('/projetosDesenvolvimentoRuralDeletar', [App\Http\Controllers\ProjetosDesenvolvimentoRuralController::class, 'delete'])->name('ProjetosDesenvolvimentoRural.delete');
    Route::post('/adicionarMunicipios', [App\Http\Controllers\MunicipiosController::class, 'store'])->name('municipios.store');
    Route::post('/deletarMunicipios', [App\Http\Controllers\MunicipiosController::class, 'delete'])->name('municipios.delete');
    Route::post('/editarMunicipios', [App\Http\Controllers\MunicipiosController::class, 'edit'])->name('municipios.edit');
    Route::post('/adicionarMembrosDoTerritorio', [App\Http\Controllers\MembrosDoTerritorioController::class, 'store'])->name('membrosDoTerritorio.store');
    Route::post('/editarMembrosDoTerritorio', [App\Http\Controllers\MembrosDoTerritorioController::class, 'edit'])->name('membrosDoTerritorio.edit');
    Route::post('/deletarMembrosDoTerritorio', [App\Http\Controllers\MembrosDoTerritorioController::class, 'delete'])->name('membrosDoTerritorio.delete');
});
