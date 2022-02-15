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

// Route::get('/', function () {
//     return view('welcome');
// });

// ログイン有効
Auth::routes();
// ログイン無効
// Auth::routes([‘register’ => false]);

Route::get('/', 'HomeController@index')->name('home');

/*1) User 認証不要*/
Route::get('/', function () { return redirect('/'); })->name('login');

/*2) User ログイン後*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'Auth\LoginController@index')->name('user.home');
});

/*3) Admin 認証不要*/
Route::group(['prefix' => 'admin'], function() {
    // Route::get('/', function () { return redirect('/admin/home'); });
    // Route::get('home',     'Admin\HomeController@index')->name('admin.home');
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

/*4) Admin ログイン後*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\LoginController@adminLogout')->name('admin.logout');
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/', function () { return redirect('/admin/home'); });

});

Route::get('/', 'User\CommunityController@index')->name('community');

Route::group(['prefix' => '/', 'middleware' => 'auth'], function() {
    // コミュニティ
    // Route::get('/', 'User\CommunityController@index')->name('community');
    Route::get('/community/genre', 'User\CommunityController@communitygenre')->name('community_genre');
    Route::get('/community/genre/list', 'User\CommunityController@communitylist')->name('community_genre_list');
    Route::get('/community/genre/list/detail', 'User\CommunityController@communitydetail')->name('community_genre_list_detail');

    // コミュニティ参加/退会
    Route::post('/community/genre/list/detail/join', 'User\JoinController@join')->name('community_join');
    Route::delete('/community/genre/list/detail/leave', 'User\JoinController@leave')->name('community_leave');
    // Route::get('/community/genre/list/detail', 'User\CommunityController@joins')->name('community_joins');

    // お知らせ
    Route::get('/notice', 'User\NoticeController@notice')->name('notice');
    Route::get('/notice/nice-partner', 'User\NoticeController@noticeNice')->name('notice_nice-partner');
    Route::get('/notice/chat', 'User\NoticeController@noticeChat')->name('notice_chat');

    // いいね
    Route::get('/nice/from-partner', 'User\NiceController@nicePartner')->name('nice_from-partner');
    Route::get('/nice/from-me', 'User\NiceController@niceMe')->name('nice_from-me');
    // チャット
    Route::get('/chat', 'User\ChatController@chat')->name('chat');

    // プロフィール
    Route::get('/profile', 'User\ProfileController@index')->name('profile');

    Route::get('/profile/create', 'User\ProfileController@add')->name('profile_add');
    Route::post('/profile/create', 'User\ProfileController@create')->name('profile_create');

    Route::get('/profile/edit', 'User\ProfileController@edit')->name('profile_edit');
    Route::post('/profile/edit', 'User\ProfileController@update')->name('profile_update');
    // ステータス
    Route::get('/status', 'User\StatusController@status')->name('status');
    // お問い合わせ
    Route::get('/contact', 'User\ContactController@contact')->name('contact');

});

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function() {

});
