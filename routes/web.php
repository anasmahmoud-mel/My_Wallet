<?php

use App\Http\Controllers\FileUpload;
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
// */

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
    Route::get('/professor', [\App\Http\Controllers\HomeController::class, 'professor'])->name('home.professor');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', [\App\Http\Controllers\LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'perform'])->name('logout.perform');
    });


    Route::group(['namespace' => 'App\Http\Controllers'], function () {


        /**
         * USER CONTROLLER Routes /// Dashboard
         */

        Route::get('/Dashboard/User/Create', [\App\Http\Controllers\UserController::class, 'create'])->name('Users.create');
        Route::post('/Dashboard/User/Create', [\App\Http\Controllers\UserController::class, 'store'])->name('Users.store');
        Route::get('/Dashboard/User/Show', [\App\Http\Controllers\UserController::class, 'show'])->name('Users.show');
        Route::get('/Dashboard/User/Edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('Users.edit');
        Route::put('/Dashboard/User/Update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('Users.update');
        route::post('/Dashboard/User/Delete', [\App\Http\Controllers\UserController::class, 'delete_user']);


        Route::get('/Dashboard/Professor/Show', [\App\Http\Controllers\UserController::class, 'showprofessor'])->name('Users.showprofessor');
        Route::get('/Dashboard/Admin/Show', [\App\Http\Controllers\UserController::class, 'showadmin'])->name('Users.showadmin');
        Route::get('/Dashboard/Student/Show', [\App\Http\Controllers\UserController::class, 'showstudent'])->name('Users.showstudent');
    });



    /**
     *PAGE CONTROLLER-
     */



    //Route::get('/d', [\App\Http\Controllers\PageController::class, 'index'])->name('index');
    //Route::get('/d',[PageController::class,'index']);

    Route::get('/uploadpage', [\App\Http\Controllers\PageController::class, 'uploadpage'])->name('uploadpage');
    //Route::get('/uploadpage',[PageController::class,'uploadpage']);

    Route::post('/uploadproduct', [\App\Http\Controllers\PageController::class, 'store'])->name('store');
    //Route::post('/uploadproduct',[PageController::class,'store']);

    Route::get('/show', [\App\Http\Controllers\PageController::class, 'show'])->name('show');
    //Route::get('/show',[PageController::class,'show']);

    Route::get('/download/{file}', [\App\Http\Controllers\PageController::class, 'download'])->name('download');
    //Route::get('/download/{file}',[PageController::class,'download']);


    //Route::get('/view/{is}',[PageController::class,'view']);

    // to view search result //
    Route::get('/file/search', [\App\Http\Controllers\PageController::class, 'search'])->name('search');

    //to view table thats contain all the doc from database //
    Route::get('/Dashboard/File/Show', [\App\Http\Controllers\PageController::class, 'showdash'])->name('showdash');


    route::post('/Dashboard/File/Delete', [\App\Http\Controllers\PageController::class, 'delete_file']);
});



// Route::get('ana', function () {
//     return view('home.edit');
// });
// Route::get('an', function () {
//     return view('home.cardprofile');
// });
// Route::get('a', function () {
//     return view('dashboard_layouts.index');
// });

Route::get('/Edit/{user}', [\App\Http\Controllers\UserController::class, 'editpup'])->name('Users.editpup');
Route::put('/Update/{user}', [\App\Http\Controllers\UserController::class, 'updatepup'])->name('Users.updatepup');
Route::get('/profile/professor/{is}', [\App\Http\Controllers\UserController::class, 'open'])->name('Users.open');



Route::get('/profile', [\App\Http\Controllers\UserController::class, 'showpup'])->name('Users.showpup');
Route::get('users/{user}',  ['as' => 'users.editpup', 'uses' => 'UserController@editpup']);
//Route::patch('users/{user}/update',  ['as' => 'users.updatepup', 'uses' => 'UserController@updatepup']);
Route::put('users/{user}/update',  ['as' => 'users.updatepup', 'uses' => 'UserController@updatepup']);



Route::get('image-upload', [\App\Http\Controllers\UserController::class, 'imageUpload'])->name('image.upload');
Route::post('image-upload', [\App\Http\Controllers\UserController::class, 'imageUploadPost'])->name('image.upload.post');



// contact us Routes

Route::get('/Contact/Create', [\App\Http\Controllers\ContactUsFormController::class, 'create'])->name('Contacts.create');
Route::post('/Contact/Create', [\App\Http\Controllers\ContactUsFormController::class, 'store'])->name('Contacts.store');
Route::get('/Dashboard/Contact/Show', [\App\Http\Controllers\ContactUsFormController::class, 'show'])->name('Contacts.show');

route::post('/Dashboard/Contact/Delete', [\App\Http\Controllers\ContactUsFormController::class, 'delete_user']);
//view the message from the user in the dashboard
Route::get('/views/{is}', [\App\Http\Controllers\ContactUsFormController::class, 'views'])->name('views');

  //to view doc in puplic ///

  Route::get('/view/{is}', [\App\Http\Controllers\PageController::class, 'view'])->name('view');

  // to view doc in dashboard //
  Route::get('/viewe/{is}', [\App\Http\Controllers\PageController::class, 'viewdash'])->name('viewdash');

  Route::get('/anas', [\App\Http\Controllers\PageController::class, 'get





  data'])->name('getdata');
