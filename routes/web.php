<?php
use Illuminate\Support\Facades\Input;
use App\User;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome','HomeController@welcome')->name('welcome');
Route::get('pages','HomeController@callpicker')->name('callpicker');


Route::prefix('admin')->group(function(){
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('adminform');
	Route::post('/login','Auth\AdminLoginController@login')->name('adminlogin');
	Route::get('/','AdminController@index')->name('admin');
});

Route::post('/search',function(){
	$q = Input::get('q');
	if($q != ""){
		$user = User::where('name', 'LIKE', '%' . $q . '%')
		->orWhere('address', 'LIKE', '%' . $q . '%')
		->get();
	if(count($user) > 0)
		return view('pages.callpicker')->withDetails($user)->withQuery($q);
	}
	return view('pages.callpicker')->withMessage("No users found!");
});

Route::get('pages/{$id}/edit','HomeController@edit')->name('edit');