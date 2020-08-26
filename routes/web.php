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


/**
 * landing Page Controller
 */
Route::get('/', 'ConnectionController@connection')->name('home');



/**
 * Authentication controller
 */
Auth::routes();



Route::group(['middleware' => ['auth']], function() {

    /**
     * food record
     */
    Route::resource('foodrecord', 'FoodRecordController');


    /**
     * search household
     */
    Route::post('search','FoodRecordController@searchFoodRecord')->name('search');
    Route::get('search/{key}','FoodRecordController@searchFoodRecordRedirect')->name('search.key');


    /**
     * form 7.2
     */
    Route::get('indiv/recall/{eacode}/{hcn}/{shsn}','FoodRecordController@individual')->name('individual');
    Route::get('indiv/recall/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}', 'FoodRecordController@recall')->name('indiv.recall');

    Route::get('indiv/recall/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}/{recday}','FoodRecordController@indivRecallEdit')->name('indiv.recall-edit');
    Route::get('indiv/recall/insert/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{GIVENNAME}/{SURNAME}/{AGE}/{recday}', 'FoodRecordController@insertFoodRecall')->name('indiv.insert-recall');
    Route::post('indiv/recall/insert', 'FoodRecordController@insertRecall')->name('insert.recall');
    Route::post('indiv/recall/ref/{id}','FoodRecordController@updateFoodRecallRef')->name('update.ref');
    Route::post('indiv/recall/line/{id}','FoodRecordController@updateRecall')->name('update.recall');


    /**
     * form 6.1
     */
    Route::get('membership/{eacode}/{hcn}/{shsn}','FoodRecordController@membership')->name('membership');
    Route::get('membership/{eacode}/{hcn}/{shsn}/{MEMBER_CODE}/{id}/edit', 'FoodRecordController@membershipEdit')->name('membership.edit');
    Route::post('membership/update-membership/{id}', 'FoodRecordController@updateMembership')->name('update.membership');
    Route::post('membership/insertVisitor','FoodRecordController@insertVisitor')->name('insert.visitor');


    /**
     * form 6.3
     */
    Route::get('record/{eacode}/{hcn}/{shsn}','FoodRecordController@record')->name('record');
    Route::post('record/updatefoodrecord/{id}', 'FoodRecordController@updateFoodRecord')->name('update.food-record');
    Route::get('record/insert/{eacode}/{hcn}/{shsn}', 'FoodRecordController@insertFoodRecord')->name('insert.record');
    Route::post('record/add/record', 'FoodRecordController@addRecord')->name('add.food-record');


    /**
     * form 6.0
     */
    Route::post('updatef60/{id}', 'FoodRecordController@updatef60')->name('update.f60');



    /**
     * data trasmission
     */
    Route::get('trans', 'DataTransmissionController@index')->name('data.trans');
    Route::post('trans/search-area','DataTransmissionController@searchArea')->name('search.area');
    Route::get('trans/redirect/{eacode}', 'DataTransmissionController@getTransRedirect')->name('get.trans-redirect');

    Route::get('trans/hh/{eacode}', 'DataTransmissionController@transHousehold')->name('trans.hh');
    Route::get('trans/indiv/{eacode}', 'DataTransmissionController@transIndividual')->name('trans.indiv');
    Route::get('trans/all/{eacode}', 'DataTransmissionController@transAll')->name('trans.all');


    /**
     * get data
     */
    Route::get('get', 'GetDataController@index')->name('get');
    Route::post('get/data', 'GetDataController@getData')->name('get.data');
    Route::get('get/data/{eacode}', 'GetDataController@getDataRedirect')->name('get.data.redirect');

    Route::get('get/hh/{eacode}', 'GetDataController@getHousehold')->name('get.hh');
    Route::get('get/indiv/{eacode}', 'GetDataController@getIndividual')->name('get.indiv');
    Route::get('get/all/{eacode}', 'GetDataController@getAll')->name('get.all');

});

