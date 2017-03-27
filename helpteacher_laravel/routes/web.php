<?php

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

//Auth::routes();

//Route::get('/home', 'HomeController@index');

//Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::get('/', function () {
   return view('welcome');
});

//rota inicial
Auth::routes();

	Route::get('/home', 'HomeController@index');		
	Route::get('admin/home', 'AdminController@index');
	Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin', 'Admin\LoginController@login');
	Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
	Route::get('admin-password/reset/(token)', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


//grupo de administrador
Route::group(['prefix' => 'admins', 'as' => 'admins.'], function(){

	Route::get('createInstituicao', 'InstituicoesController@create')->name('instituicao.create');
	Route::post('storeInstituicao', 'InstituicoesController@store')->name('instituicao.store');
	Route::get('/instituicoes', 'InstituicoesController@index')->name('instituicao.index');

	Route::get('createUnidade', 'UnidadesController@create')->name('unidade.create');
	Route::post('storeUnidade', 'UnidadesController@store')->name('unidade.store');
	Route::get('/unidades', 'UnidadesController@index')->name('unidade.index');

	Route::get('createProfessor', 'ProfessoresController@create')->name('professor.create');
	Route::post('storeProfessor', 'ProfessoresController@store')->name('professor.store');
	Route::get('/professores', 'ProfessoresController@index')->name('professor.index');

	Route::get('createTurma', 'TurmasController@create')->name('turma.create');
	Route::post('storeTurma', 'TurmasController@store')->name('turma.store');
	Route::get('turmas', 'TurmasController@index')->name('turma.index');

	Route::get('createDisciplina', 'DisciplinasController@create')->name('disciplina.create');
	Route::post('storeDisciplina', 'DisciplinasController@store')->name('disciplina.store');
	Route::get('/disciplinas', 'DisciplinasController@index')->name('disciplina.index');

	Route::get('createAssunto', 'AssuntosController@create')->name('assunto.create');
	Route::post('storeAssunto', 'AssuntosController@store')->name('assunto.store');
	Route::get('/assuntos', 'AssuntosController@index')->name('assunto.index');

});

//grupo de professor
Route::group(['prefix' => 'professor', 'as' => 'professor.'], function(){

	Route::get('createProva', 'ProvasController@create')->name('prova.create');
	Route::post('storeProva', 'ProvasController@store')->name('prova.store');
	Route::get('/provas', 'ProvasController@index')->name('prova.index');
	Route::get('editProva/{id}', 'ProvasController@edit')->name('prova.edit');
	Route::put('updateProva/{id}', 'ProvasController@update')->name('prova.update');

	Route::get('createGabarito', 'GabaritosController@create')->name('gabarito.create');
	Route::post('storeGabarito', 'GabaritosController@store')->name('gabarito.store');
	Route::get('/gabaritos', 'GabaritosController@index')->name('gabarito.index');
	Route::get('editGabarito/{id}', 'GabaritosController@edit')->name('gabarito.edit');
	Route::put('updateGabarito/{id}', 'GabaritosController@update')->name('gabarito.update');

	Route::post('storeQuestao', 'QuestoesController@store')->name('questao.store');
	Route::get('/questoes', 'QuestoesController@index')->name('questao.index');
	
	Route::get('createCorrecao','CorrecoesController@create')->name('correcao.create');
	Route::post('storeCorrecao', 'CorrecoesController@store')->name('correcao.store');
	
		
});

//grupo de rotas de unidade
Route::group(['prefix' => 'unidade', 'as' => 'unidade.'], function(){

	Route::get('graficoAssuntos', 'GraficosController@mostrarGraficoAssuntos')->name('graficoAssuntos.mostrar');	
	Route::get('graficoTurmas', 'GraficosController@mostrarGraficoTurmas')->name('graficoTurmas.mostrar');	
});



/*Auth::routes();

Route::get('/home', 'HomeController@create');

Auth::routes();

Route::get('/home', 'HomeController@create');*/


