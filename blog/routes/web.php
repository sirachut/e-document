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

Route::get('/', ['as'=>'list','uses'=>'DocumentController@index']);



Route::resource('user', 'UserController');
Route::resource('document', 'DocumentController');
Route::resource('barcode', 'BarcodeController');
// Route::resource('faculty', 'FacultyController');


Route::get('/pdf', ['as'=>'PdfDemo','uses'=>'PdfDemoController@index']);
Route::get('/sample-pdf', ['as'=>'SamplePDF','uses'=>'PdfDemoController@samplePDF']);
Route::get('/save-pdf', ['as'=>'SavePDF','uses'=>'PdfDemoController@savePDF']);
Route::get('/download-pdf', ['as'=>'DownloadPDF','uses'=>'PdfDemoController@downloadPDF']);
Route::get('/html-to-pdf', ['as'=>'HtmlToPDF','uses'=>'PdfDemoController@htmlToPDF']);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@Login');
Route::get('logout', 'Auth\LoginController@Logout');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();
Route::get('group/{gid}', 'Auth\LoginController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/mdb', function () {
    return view('mdb.modalRight');
});

Route::get('/test', function () {
    return view('list.testdate');
});

