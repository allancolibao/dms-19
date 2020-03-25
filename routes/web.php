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

// Welcome
Route::get('/', 'ConnectionController@connection');

Auth::routes();

// Progress
Route::get('/progress', 'ProgressController@index')->name('progress');


// Chart
Route::get('/home', 'FusionCharts@home');

// Summary
Route::get('/summary', 'SummaryController@summary');
Route::get('/summary1', 'SummaryController@summary1');
Route::get('/summary2', 'SummaryController@summary2');
Route::get('/summary3', 'SummaryController@summary3');
Route::get('/summary4', 'SummaryController@summary4');
Route::get('/summary5', 'SummaryController@summary5');
Route::get('/summary6', 'SummaryController@summary6');
Route::get('/summary7', 'SummaryController@summary7');
Route::get('/summary8', 'SummaryController@summary8');
Route::get('/summary9', 'SummaryController@summary9');
Route::get('/summary10', 'SummaryController@summary10');
Route::get('/summary11', 'SummaryController@summary11');
Route::get('/summary12', 'SummaryController@summary12');
Route::get('/summary13', 'SummaryController@summary13');
Route::get('/summary14', 'SummaryController@summary14');
Route::get('/summary15', 'SummaryController@summary15');
Route::get('/summary16', 'SummaryController@summary16');
Route::get('/summary17', 'SummaryController@summary17');
Route::get('/summary18', 'SummaryController@summary18');
Route::get('/summary19', 'SummaryController@summary19');
Route::get('/summary20', 'SummaryController@summary20');
Route::get('/summary21', 'SummaryController@summary21');
Route::get('/summary22', 'SummaryController@summary22');
Route::get('/summary23', 'SummaryController@summary23');
Route::get('/summary24', 'SummaryController@summary24');
Route::get('/summary25', 'SummaryController@summary25');
Route::get('/summary26', 'SummaryController@summary26');
Route::get('/summary27', 'SummaryController@summary27');
Route::get('/summary28', 'SummaryController@summary28');
Route::get('/summary29', 'SummaryController@summary29');
Route::get('/summary30', 'SummaryController@summary30');
Route::get('/summary31', 'SummaryController@summary31');
Route::get('/summary32', 'SummaryController@summary32');
Route::get('/summary33', 'SummaryController@summary33');
Route::get('/summary34', 'SummaryController@summary34');
Route::get('/summary35', 'SummaryController@summary35');
Route::get('/summary36', 'SummaryController@summary36');
Route::get('/summary37', 'SummaryController@summary37');
Route::get('/summary38', 'SummaryController@summary38');
Route::get('/summary39', 'SummaryController@summary39');


// Transmission Log
Route::group(['middleware' => ['web']], function() {
Route::get('/transmission', 'TransmissionController@index');
Route::POST('addLog','TransmissionController@addLog');
});


// +++++++++++++++++++ Food record controller ++++++++++++++++ //
Route::group(['middleware' => ['web']], function() {
Route::resource('foodrecord', 'FoodRecordController');

// Search eacode
Route::any('/searchfoodrecord','FoodRecordController@searchFoodRecord')->name('search');

// Form 7.2
Route::get('recall/{eacode}/{hcn}/{shsn}','FoodRecordController@members')->name('members');
Route::get('memrecall/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}','FoodRecordController@recall')->name('mem_recall');
Route::get('memrecall/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}/{recday}','FoodRecordController@memrecall')->name('mem_recall_edit');
Route::get('memrecall/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}/{recday}/{id}/edit','FoodRecordController@editline')->name('editline');
Route::get('insertrecall/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}/{recday}','FoodRecordController@insertFoodRecall')->name('insertrecall');
Route::POST('insertfoodRecall','FoodRecordController@insertRecall');
Route::any('updateLineOne/{id}','FoodRecordController@updateLineOne');

// Form 6.1
Route::get('membership/{eacode}/{hcn}/{shsn}','FoodRecordController@membership')->name('membership');
Route::get('membership/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{id}/edit','FoodRecordController@membershipedit')->name('membership_edit');
Route::any('updatemembership/{id}', 'FoodRecordController@updatemembership');
Route::POST('insertVisitor','FoodRecordController@insertVisitor');

// Form 6.3
Route::get('record/{eacode}/{hcn}/{shsn}','FoodRecordController@record')->name('record');
Route::get('record/{eacode}/{hcn}/{shsn}/{id}/edit','FoodRecordController@editrecord')->name('record_edit');
Route::any('updatefoodrecord/{id}', 'FoodRecordController@updatefoodrecord');
Route::get('insert/{eacode}/{hcn}/{shsn}', 'FoodRecordController@insertFoodRecord')->name('insert_record');
Route::POST('addRecord','FoodRecordController@addRecord');

});

// F60
Route::any('updatef60/{id}', 'FoodRecordController@updatef60');

// Count
Route::get('count', 'FoodRecordController@count');



