<?php

use App\Models\Driver;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Models\Slider;
use App\Models\Soal;
use App\Models\CarTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    $Driver=Driver::all();
    $CarT=CarTransfer::query()->orderByDesc('created_at')->paginate(10);
    $Soal=Soal::query()->orderByDesc('created_at')->paginate(5);
    $slides=Slider::query()->orderByDesc('created_at')->paginate(5);
    $Cars=Car::query()->orderByDesc('created_at')->paginate(4);
    $items= Products::query()->orderByDesc('id')->paginate(10);
    $title='بهان تجارت آفرین';
    return view('Mahsulat',compact('title','items','Cars','slides','Soal','CarT','Driver'));
});
Route::get('HomeApp', function (Request $request) {
    $Driver=Driver::all();
    $CarT=CarTransfer::query()->orderByDesc('created_at')->paginate(3);
    $Soal=Soal::query()->orderByDesc('created_at')->paginate(5);
    $slides=Slider::query()->orderByDesc('created_at')->paginate(5);
    $Cars=Car::query()->orderByDesc('created_at')->paginate(10);
    $items= Products::query()->orderByDesc('id')->paginate(10);
    $title='وب اپلیکیشن بهان تجارت آفرین';
    $ip=$request->ip();
    return view('HomeApp',compact('title','items','Cars','slides','Soal','CarT','Driver','ip'));
})->name('HomeApp');
Route::resource('Home',\App\Http\Controllers\HomeController::class);
Route::resource('AmirmahdiAsadi', \App\Http\Controllers\About\AboutController::class)->except('show');

// Register Route
Route::get('signup', [\App\Http\Controllers\Auth\RegisterController::class, 'view'])->name('signup.view');
Route::post('signup', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('signup.register');
// Register Route

// Login Route
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'view'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Login Route

// Forgot Password
Route::get('/forgot-password', function () {
    return view('Auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->withErrors(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('Auth.reset-password', ['token' => $token]);
})->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->withErrors('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');
// Forgot Password

// Verify Email
Route::get('/email/verify', function () {
    return view('Auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// Verify Email

// Logout Route
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, "logout"])->name("logout");
// Logout Route

// dashboard Route
Route::group(['prefix' => config("app.admin_prefix"), "as" => "Admin.", "middleware" => ["auth",'verified']], function () {
    Route::get("/", [\App\Http\Controllers\Admin\PanelController::class, "index"])->name("dashboard");
    Route::resource('Editusers', \App\Http\Controllers\Admin\EditusersController::class)->except('show');
    Route::resource('Products', \App\Http\Controllers\Products\ProductsController::class);
    Route::resource('Orders', \App\Http\Controllers\OrderController::class)->except('show');
    Route::resource('Cars', \App\Http\Controllers\Cars\CarsController::class)->except('show');
    Route::resource('CarsTransfer', \App\Http\Controllers\Cars\CarTransfersController::class);
    Route::resource('Driver', \App\Http\Controllers\DriverController::class)->except('show');
    Route::resource('Initialize', \App\Http\Controllers\Products\InitializeController::class)->except('show');
    Route::resource('Sort', \App\Http\Controllers\Products\SortController::class)->except('show');
    Route::get('/search/', [\App\Http\Controllers\searchController::class, 'search'])->name('search');
    Route::get('/filter/', [\App\Http\Controllers\searchController::class, 'filter'])->name('filter');
    Route::resource('cost', \App\Http\Controllers\Cost\CostController::class);
    Route::get('/filtercost/', [\App\Http\Controllers\Cost\CostFilterController::class, 'filter'])->name('filtercost');
    Route::get('/searchcost/', [\App\Http\Controllers\Cost\CostFilterController::class, 'search'])->name('searchcost');
    Route::resource('costSort', \App\Http\Controllers\Cost\CostSortController::class)->except('show');
    Route::resource('Tamin', \App\Http\Controllers\Products\TaminController::class)->except('show');
    Route::resource('Slider', \App\Http\Controllers\SliderController::class)->except('show');
    Route::resource('Soal', \App\Http\Controllers\SoalController::class)->except('show');
    Route::resource('AboutMe', \App\Http\Controllers\About\AboutMeController::class)->except('show');
    Route::resource('Favorite', \App\Http\Controllers\About\MyFavoriteController::class)->except('show');
    Route::resource('Vorud', \App\Http\Controllers\Products\VorudController::class);
    Route::get('searchVorud',[\App\Http\Controllers\Products\VorudController::class, "searchVorud"])->name('searchVorud');
    Route::get('filterVorud',[\App\Http\Controllers\Products\VorudController::class, "filterVorud"])->name('filterVorud');
    Route::resource('Out', \App\Http\Controllers\Products\OutController::class);
    Route::get('searchOut',[\App\Http\Controllers\Products\OutController::class, "searchOut"])->name('searchOut');
    Route::get('filterOut',[\App\Http\Controllers\Products\OutController::class, "filterOut"])->name('filterOut');
    Route::resource('Indicator', \App\Http\Controllers\Products\IndicatorController::class);
    Route::get('searchIndicator',[\App\Http\Controllers\Products\IndicatorController::class, "index"])->name('searchIndicator');
    Route::get('filterIndicator',[\App\Http\Controllers\Products\IndicatorController::class, "filter"])->name('filterIndicator');
    Route::resource('Indicators', \App\Http\Controllers\Products\IndicatorsController::class);
    Route::resource('Links', \App\Http\Controllers\Products\LinksController::class);
    Route::get('searchLink',[\App\Http\Controllers\Products\LinksController::class, "searchLink"])->name('searchLink');
    Route::resource('RegUp', \App\Http\Controllers\Auth\UserUpdateController::class);
});
// dashboard Route
Route::get('files/{slashData}', [\App\Http\Controllers\FileController::class, "show"])
    ->where('slashData', '(.*)')
    ->name("files.show");

Route::get('Avatars/{path}', [\App\Http\Controllers\Admin\PanelController::class, 'showAvatar'])->name('showAvatar');


