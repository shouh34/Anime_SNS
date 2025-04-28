<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DMController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImgBBSController;
use App\Http\Controllers\ImgBBSViewController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserSearcherController;
use App\Http\Middleware\PreventBackHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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


/*
Route::get('/auto-login', function () {
    $user = User::find(1);

    if (!$user) {
        Log::warning('自動ログイン失敗：ID 1のユーザーが見つかりません');
        abort(404, 'ユーザーが見つかりませんでした');
    }

    Auth::login($user, true); // ←trueでログイン保持
    return redirect('/dashboard')->with('welcome', $user->name . 'さん、ようこそ！');
});



*/


//季節アニメ
Route::get('/seasonal', [AnimeController::class, 'seasonal'])->name('anime.seasonal');


//アニメ検索
Route::get('/anime/search', [AnimeController::class, 'search'])->name('anime.search');
//Route::post('/AnimeSearch', [AnimeController::class, 'search'])->name('anime.post');



//アニメ専用スレッド作成
Route::get('/ThreadCreate/{Title}', [ImgBBSController::class, 'Create'])->name('anime.Thread');

Route::get('/ThreadInfo/{id}', [ImgBBSController::class, 'Create'])->name('anime.Info');





//一般ユーザー
//ミドルウェアで認証を保持
Route::middleware(['web'])->group(function () {
    // 認証が必要なルート
    Route::get('/', [HomeController::class, 'index'])->name('login');
    
    // ここでPOSTメソッドを処理
    Route::post('/', [HomeController::class, 'store']);
});

/*
Route::middleware([PreventBackHistory::class])->group(function () {
    // このグループ内のルートにミドルウェアが適用される
    Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard');
    // 他のルートも追加できます
});
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard');
    // 他にも認証が必要なページを追加
});



//Good押したときの処理
Route::get('/Good_add/{id}', [ImgBBSViewController::class, 'Good_add'])->name('Good.add');

Route::get('/reply_add/{id}', [ImgBBSViewController::class, 'Reply_add'])->name('Reply.add');

//DM
Route::get('/DM', [DMController::class, 'index'])->name('DM');
Route::post('/DM/store', [DMController::class, 'store'])->name('DM.store');

//設定
Route::get('/Settings', [SettingsController::class, 'index'])->name('Settings');

//プロフィール
Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');

//編集画面遷移
Route::get('/profile_Edit', [UserProfileController::class, 'Store'])->name('profile_Edit');


//プロフィール更新
Route::put('/profile_Update/{id}', [UserProfileController::class, 'update'])->name('profile.update');


//登録
Route::get('/register', [RedisterController::class, 'index'])->name('register');

//共有
Route::get('/share', [ShareController::class, 'index'])->name('Share');

//新規登録
Route::get('/Newregister', [RedisterController::class, 'index'])->name('Newregister');
Route::post('/Newregister/store', [RedisterController::class, 'store'])->name('Newregister.post');



Route::get('/Dashbord', [DashbordController::class, 'index'])->name('Dashbord');;

//スレッド作成
Route::get('/ImgBBS', [ImgBBSController::class,'index'])->name('ImgBBS');
Route::post('/ImgBBS', [ImgBBSController::class,'post']);


//スレッド一覧
Route::get('/ImgBBS_view', [ImgBBSViewController::class,'index'])->name('ImgBBS_view');
//スレッド内に移動
Route::get('/ImgBBS_view/post/{id}', [ImgBBSViewController::class,'store'])->name('ImgBBS_post_view');

Route::post('/ImgBBS_view/post/{id}/comment', [ImgBBSViewController::class,'post'])->name('ImgBBS.post.comment');

//ログアウト
Route::get('/logout', [LogoutController::class,'index'])->name('logout');





//管理者

//ユーザー検索
Route::get('/UserSearch', [UserSearcherController::class,'index'])->name('User.Search');



