<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/getrecords', function(Request $request) {
    $records = array(
        "draw" => $request->draw,
        "recordsTotal" => 1,
        "recordsFiltered" => 1,
        "data" => array(
            array(
                "num" => "1",
                "dat" => "2022-04-18 08:05:00",
                "str" => "Test 1"
            )
        ),
        "sbcriteria" => isset($request->searchBuilder) ? $request->searchBuilder['criteria'][0]['value1'] : null
    );
    return json_encode($records);
});
