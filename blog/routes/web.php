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
Route::resource('documents', 'DocumentController');
Route::get('documentslist', 'DocumentController@getdata');
Route::resource('barcode', 'BarcodeController');
// Route::resource('faculty', 'FacultyController');

Route::get('sent/{get_gid}', 'SentController@index');
Route::get('sent', 'SentController@index');
Route::get('sentlist', 'SentController@getdata');
Route::get('sentlist/{get_gid}', 'SentController@getdata');
Route::get('sentcontrolcode', 'SentController@index');
Route::post('sent_item', 'SentController@add');
Route::post('sentitemcontrolcode', 'SentController@add_control_code');
//Route::post('sentitemcontrolcode', 'SentController@add_control_code')->name('Sent.add_control_code');
//Route::put('/sentitemcontrolcode', 'SentController@add_control_code')->name('Sent.add_control_code');
Route::post('director', 'SentController@director');
Route::post('directorcontrolcode', 'SentController@director_control_code');
Route::get('receive', 'ReceiveController@index');
Route::get('receivelist', 'ReceiveController@getdata');
Route::post('receive_item', 'ReceiveController@add');
Route::post('receiveitemcontrolcode', 'ReceiveController@add_control_code');

Route::get('done', 'DoneController@index');
Route::post('done', 'DoneController@done');
Route::post('doneitemcontrolcode', 'DoneController@done_control_code');
//Route::post('director', 'SentController@director');

Route::get('documentitem/{get_id}', 'DocumentItemController@index');
Route::get('attachmentlist/{id}', 'DocumentAttachmentController@getdata');
Route::get('attachmentdownload/{filename}', 'DocumentAttachmentController@download');

Route::get('/example/create', 'ExampleController@create');
Route::post('/example', 'ExampleController@store');

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

