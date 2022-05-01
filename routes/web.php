<?php

use App\Http\Controllers\web\AboutusController;
use App\Http\Controllers\web\ContactusController;
use App\Http\Controllers\web\DemoController;
use App\Http\Controllers\web\FaqController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\HowtoplayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\LeaderboardController;

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

// Route::get('/country',[DemoController::class,'countryData']);
// Route::get('/season',[DemoController::class,'seasonData']);
// Route::get('/league',[DemoController::class,'leagueData']);

// Route::get('/',function(){
//     echo "fineee";die;
// });
//
Route::get('/',[HomeController::class,'index']);
Route::get('/fixture',[DemoController::class,'fixtureData']);


Route::get('/about_us', [AboutusController::class,'index']);
Route::get('/contact_us', [ContactusController::class,'index']);
Route::get('/faq', [FaqController::class,'index']);



Route::get('/how_to_play', [HowtoplayController::class,'index']);


Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    // Route::group(['middleware' => ['verified']], function() {
        /**
         * Dashboard Routes
         */
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/team', [TeamController::class, 'index'])->name('team');

        Route::get('/manage-squad', [TeamController::class, 'managesquadone'])->name('manage-squad');
        Route::get('/edit-team/manage-squad', [TeamController::class, 'managesquadone'])->name('manage-squad');
        Route::get('/manage-squad-sec', [TeamController::class, 'managesquadtwo'])->name('manage-squad-sec');
        Route::get('/edit-team/manage-squad-sec', [TeamController::class, 'managesquadtwo'])->name('manage-squad-sec');
        Route::get('/manage-squad-thr', [TeamController::class, 'managesquadthree'])->name('manage-squad-thr');
        Route::get('/edit-team/manage-squad-thr', [TeamController::class, 'managesquadthree'])->name('manage-squad-thr');

        Route::get('/edit-team/{id}', [TeamController::class, 'createTeam'])->name('edit-team');
        Route::get('/edit-team/create-team', [TeamController::class, 'createTeam'])->name('create-team');
        Route::get('/create-team', [TeamController::class, 'createTeam'])->name('create-team');
        Route::get('/edit-team/create-team', [TeamController::class, 'createTeam'])->name('create-team');
        Route::get('/my-pool', [PoolController::class, 'index'])->name('my-pool');
        Route::get('/create-pool', [PoolController::class, 'createPool'])->name('create-pool');
        Route::post('/insert', [PoolController::class, 'insert'])->name('insert');
        Route::get('/latest-news', [App\Http\Controllers\NewsController::class, 'index'])->name('latest-news');

        Route::get('/manager-lounge', [ManagerController::class, 'index'])->name('manager-lounge');
        Route::post('/create-post', [ManagerController::class, 'index'])->name('create-post');
        Route::post('/store-post', [ManagerController::class, 'store'])->name('store-post');

        Route::get('/leaderboard',[LeaderboardController::class,'index'])->name('leaderboard');
// });

    Route::get('/email/verify', [VerificationController::class ,'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
    Route::get('/fixture-data', [FixtureController::class,'index'])->name('fixture-data');
    Route::post('/fixture-data', [FixtureController::class,'index'])->name('fixture-data');


    // Route::get('/fixture-data',function(){
    //     return view('users/fixture');
    // });
});

Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });

 Route::get("/{slug}", function () {
    return view('page/error_404');
});


