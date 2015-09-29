<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Home Route
 * ------------------------------------------------------------------------------
 *   Route : /
 *   Controller : HomeController
 *   Method : index
 *
 */
Route::get('/', 'HomeController@index');

/**
 * Login & Logout
 * -----------------------------
 *  Route : login, logout
 *  Controller : SigkatAuthController
 *  Method : login, logout
 */
Route::get('login', 'SigkatAuthController@getLogin');
Route::post('login', 'SigkatAuthController@postLogin');
Route::get('logout', 'SigkatAuthController@getLogout');


/**
 * User Registration
 * ------------------------------
 *
 *
 */
Route::get('registrasi', 'UserController@getRegistrationForm');
Route::post('register1', 'UserController@postRegistrationOne');
Route::get('register1', 'UserController@getRegistrationTwo');
Route::post('registrasi2', 'UserController@prosesRegistrasi');

/**
 * Data Umat
 * --------------------------------------------
 *
 */
Route::get('umat', 'UmatController@index');
Route::post('umat', 'UmatController@filters');
Route::get('admin/umat/input', 'UmatController@create');
Route::post('admin/umat/input','UmatController@store');
Route::get('admin/umat/edit/{id}', 'UmatController@edit'); //edit umat by admin only
Route::post('admin/umat/edit/{id}', 'UmatController@editSave'); //edit umat by admin only


/**
 * Lingkungan
 * ---------------
 */
get('/lingkungan', 'LingkunganController@adminIndex');
get('/lingkungan/keluarga', 'LingkunganController@keluarga');

/**
 * Berita
 * ------------------------------
 *
 */
Route::get('berita/', 'BeritaController@index'); //index Berita
Route::get('berita/{id}','BeritaController@show'); //singgle view
Route::get('/admin/berita/edit/{id}', 'BeritaController@edit');
Route::get('/admin/berita/create', 'BeritaController@create');

/**
 * Kegiatan
 */
get('/kegiatan', 'KegiatanController@index');
get('/kegiatan/buat', 'KegiatanController@create');

/**
 * Bacaan
 * -------------
 */
get('/bacaan/buat', 'BacaanController@create');
get('/bacaan/', 'BacaanController@index');

/**
 * Forum
 * -----------------------------
 * Controller : ForumController
 *
 */
Route::get('forum/index', [ 'as' => 'forum', 'uses' => 'ForumController@index' ]);
Route::get('forum/{kID}/index', 'ForumController@katIndex');
Route::get('forum/{kID}/{tID}', 'ForumController@topIndex');
Route::get('forum/{kID}/{tID}/post', 'ForumController@showCreate');
Route::post('forum/{kID/{tID}/post', 'ForumController@saveCreate');


/**
 * Pengumuman
 * ----------------
 */
get('pengumuman/', 'PengumumanController@index');
get('/admin/pengumuman/', 'PengumumanController@create');
post('/admin/pengumuman/', 'PengumumanController@store');


/**
 * Sakramen
 * -------------
 */
get('sakramen/{sakramen}', 'SakramenController@index');

/**
 * Kategorial
 *
 */
get('kategorial/{kategorial}', 'KategorialController@index');

/**
 * About
 */
get('about/{about}','AboutController@index');

/**
 * admin
 */
Route::get('admin/forum/kategori', ['as' => 'manKategoriForum', 'uses' => 'ForumKategoriController@showManKat']);
Route::post('admin/forum/kategori', 'ForumKategoriController@simpanKategori');
Route::post('admin/forum/kategori/{id}', 'ForumKategoriController@simpanKategori');
Route::get('admin/forum/kategori/{id}', 'ForumKategoriController@editKategori');
Route::get('/admin/umat/', 'UmatController@adminIndex');
//Route::get('/admin/user/')

/**
 * User Profile
 *

 */
Route::get('user/profile', [ 'as' => 'profile', 'uses' => 'UserController@index' ]);
Route::any('user/upload', 'UserController@uploadFoto');
Route::get('user/password/{id}', ['as' => 'password', 'uses' => 'UserController@passWord']);
Route::post('user/password/{id}', 'UserController@ubahPass');
Route::get('user/profile/edit/{id}', 'UserController@edit');
Route::post('user/profile/edit/{id}', 'UserController@store');

get('/admin/userlist', 'UserController@list');




/**
 * Checking Sessions
 *-----------------------------
 *
 */
Route::get(
    'sessions', function ()
{
    dd(
        [ 'Sessions Dump' => Session::all() ], [ 'Auth Check' => Auth::check() ], [ 'User' => Auth::user() ],
        [ 'ID' => Auth::id() ], [ 'Inputs' => \Input::all() ], ['Request' => \Request::all()]
        //, [ 'Data' => $userStat ]
    );
}
);
Route::get('sessionFlush', function (){
    var_dump(Session::all());
    Session::flush();
    echo '<br>';
    var_dump(Session::all());
}
);

/**
 * AdminSidebarRepo
 * -----------------------------------
 *
 */
/*View::composer(
    'addons.adminSidebar', function ($view)
{
    $view->with(compact('userStat'));
}
);*/

/**
 * Testing Purpose!!!!!
 * ------------------------------
 *
 */
Route::get('test/{taest}', function ($taest){
    return view($taest);
    dd('rout');
    });

Route::get('tes', function (){
    dd(file_exists('images/user/uid-1.jpg'));
    $kategori = \stjo\Model\ForumKategori::all();
        foreach($kategori as $kat=>$key)
        {
            $topiks = $kategori->topiks;
            foreach ($topiks as $topik=>$tKey){

            }
        }

    return view('tes', compact(['post', 'kategori']));
});