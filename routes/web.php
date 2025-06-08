<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DMController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ImgBBSController;
use App\Http\Controllers\ImgBBSViewController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserSearcherController;
use App\Http\Middleware\PreventBackHistory;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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


//まっぷ
Route::get('/Maps', [LocationController::class, 'index'])->name('Map.location');


//季節アニメ
Route::get('/seasonal', [AnimeController::class, 'seasonal'])->name('anime.seasonal');


//アニメ検索
Route::get('/anime/search', [AnimeController::class, 'index'])->name('anime.searcher');


//ダッシュボードの検索ボックス
Route::post('/Profile/search/post', [ProfileController::class, 'search'])->name('Profile.post');

//プロフィールの詳細情報
Route::get('/Profile/info', [ProfileController::class,'info'])->name('Profile.info');





//一般ユーザー
//ミドルウェアで認証を保持
Route::middleware(['web'])->group(function () {
    // 認証が必要なルート
    Route::get('/', [HomeController::class, 'index'])->name('login');
    
    // ここでPOSTメソッドを処理
    Route::post('/', [HomeController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', [DashbordController::class, 'index'])->name('dashboard');
    // 他にも認証が必要なページを追加


//設定
Route::get('/Settings', [SettingsController::class, 'index'])->name('Settings');

//プロフィール
Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
Route::get('/profile/info', [UserProfileController::class, 'info'])->name('Profile.info');

//編集画面遷移
Route::get('/profile/Edit/{id}', [UserProfileController::class, 'index'])->name('Profile.Edit');


//プロフィール更新
Route::put('/profile/Update/{id}', [UserProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');


//登録
//Route::get('/register', [RedisterController::class, 'index'])->name('register');

//共有
Route::get('/share', [ShareController::class, 'index'])->name('Share');



//ダッシュボード
Route::get('/Dashbord', [DashbordController::class, 'index'])->name('Dashbord');;
//ログアウト
Route::get('/logout', [LogoutController::class,'index'])->name('logout');




//ブログ
Route::get('/Blog/index', [BlogController::class,'index'])->name('Blog.index');

//本文を見る
Route::get('/Blog/main/{id}', [BlogController::class, 'main_info'])->name('Blog.main');




//ブログ投稿画面表示
Route::get('/Blog/Edit', [BlogController::class,'Edit'])->name('Blog.Edit');


//投稿
Route::post('/Blog/Edit/post', [BlogController::class,'post'])->name('Blog.post');






//編集画面表示
Route::get('/Blog/ReEdit/{id}', [BlogController::class, 'Edit_info'])->name('Blog.ReEdit');
//編集投稿
Route::post('/Blog/ReEdit/{id}', [BlogController::class, 'Edit_info_post'])->name('Blog.ReEdit.post');


//ブログ記事削除
Route::get('/Blog/Delete/{id}', [BlogController::class, 'Delete'])->name('Blog.Delete');


//管理者

//ユーザー検索
Route::get('/UserSearch', [UserSearcherController::class,'index'])->name('User.Search');

Route::post('/upload-image', [BlogController::class, 'upload'])->name('upload.image');

});


//新規登録
Route::get('/register', [RedisterController::class, 'index'])->name('register');
Route::post('/register/store', [RedisterController::class, 'store'])->name('register.post');

