<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\About\AboutMeController;
use App\Http\Controllers\About\MyFavoriteController;
use App\Http\Controllers\Admin\EditusersController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserUpdateController;
use App\Http\Controllers\Cars\CarsController;
use App\Http\Controllers\Cars\CarTransfersController;
use App\Http\Controllers\Cost\CostController;
use App\Http\Controllers\Cost\CostFilterController;
use App\Http\Controllers\Cost\CostSortController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Products\IndicatorController;
use App\Http\Controllers\Products\IndicatorsController;
use App\Http\Controllers\Products\InitializeController;
use App\Http\Controllers\Products\LinksController;
use App\Http\Controllers\Products\OutController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Products\SortController;
use App\Http\Controllers\Products\TaminController;
use App\Http\Controllers\Products\VorudController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SoalController;
use App\Models\Driver;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
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
//    $Driver=Driver::all();
//    $CarT=CarTransfer::query()->orderByDesc('created_at')->paginate(10);
//    $Soal=Soal::query()->orderByDesc('created_at')->paginate(5);
//    $slides=Slider::query()->orderByDesc('created_at')->paginate(5);
//    $Cars=Car::query()->orderByDesc('created_at')->paginate(4);
//    $items= Products::query()->orderByDesc('id')->paginate(10);
//    $title='بهان تجارت آفرین';
//    return view('Mahsulat',compact('title','items','Cars','slides','Soal','CarT','Driver'));
    return redirect()->to('/Home');
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
Route::resource('Home', HomeController::class);
Route::resource('AmirmahdiAsadi', AboutController::class)->except('show');

// Register Route
Route::get('signup', [RegisterController::class, 'view'])->name('signup.view');
Route::post('signup', [RegisterController::class, 'register'])->name('signup.register');
// Register Route

// Login Route
Route::get('login', [LoginController::class, 'view'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
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
Route::get('logout', [LoginController::class, "logout"])->name("logout");
// Logout Route

// dashboard Route
Route::group(['prefix' => config("app.admin_prefix"), "as" => "Admin.", "middleware" => ["auth",'verified']], function () {
    Route::get("/", [PanelController::class, "index"])->name("dashboard");
    Route::resource('Editusers', EditusersController::class)->except('show');
    Route::resource('Products', ProductsController::class);
    Route::resource('Orders', OrderController::class)->except('show');
    Route::resource('Cars', CarsController::class)->except('show');
    Route::resource('CarsTransfer', CarTransfersController::class);
    Route::resource('Driver', DriverController::class)->except('show');
    Route::resource('Initialize', InitializeController::class)->except('show');
    Route::resource('Sort', SortController::class)->except('show');
    Route::get('/search/', [searchController::class, 'search'])->name('search');
    Route::get('/filter/', [searchController::class, 'filter'])->name('filter');
    Route::resource('cost', CostController::class);
    Route::get('/filtercost/', [CostFilterController::class, 'filter'])->name('filtercost');
    Route::get('/searchcost/', [CostFilterController::class, 'search'])->name('searchcost');
    Route::resource('costSort', CostSortController::class)->except('show');
    Route::resource('Tamin', TaminController::class)->except('show');
    Route::resource('Slider', SliderController::class)->except('show');
    Route::resource('Soal', SoalController::class)->except('show');
    Route::resource('AboutMe', AboutMeController::class)->except('show');
    Route::resource('Favorite', MyFavoriteController::class)->except('show');
    Route::resource('Vorud', VorudController::class);
    Route::get('searchVorud',[VorudController::class, "searchVorud"])->name('searchVorud');
    Route::get('filterVorud',[VorudController::class, "filterVorud"])->name('filterVorud');
    Route::resource('Out', OutController::class);
    Route::get('searchOut',[OutController::class, "searchOut"])->name('searchOut');
    Route::get('filterOut',[OutController::class, "filterOut"])->name('filterOut');
    Route::resource('Indicator', IndicatorController::class);
    Route::get('searchIndicator',[IndicatorController::class, "index"])->name('searchIndicator');
    Route::get('filterIndicator',[IndicatorController::class, "filter"])->name('filterIndicator');
    Route::resource('Indicators', IndicatorsController::class);
    Route::resource('Links', LinksController::class);
    Route::get('searchLink',[LinksController::class, "searchLink"])->name('searchLink');
    Route::resource('RegUp', UserUpdateController::class);
});
// dashboard Route
Route::get('files/{slashData}', [FileController::class, "show"])
    ->where('slashData', '(.*)')
    ->name("files.show");

Route::get('Avatars/{path}', [PanelController::class, 'showAvatar'])->name('showAvatar');


