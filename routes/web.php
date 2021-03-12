<?php

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

Route::get('/', function () {
    $test = DB::table('accounts')
    ->join('tests', 'tests.test_account_id', '=', 'accounts.account_id')
    ->select('accounts.account_username as Username', DB::raw("count(tests.test_title) as Number_of_test"))
    ->groupBy('tests.test_account_id')
    ->orderBy(DB::raw("count(tests.test_title)"), $this->option('desc'))
    ->get();

    return $test;
});

Route::view('/pdf', 'pdf');