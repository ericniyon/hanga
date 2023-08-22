<?php


use App\Http\Controllers\v2\ApisController;
use App\Http\Controllers\v2\Auth\ForgotPasswordController;
use App\Http\Controllers\v2\Auth\LoginController;
use App\Http\Controllers\v2\Auth\RegisterController;
use App\Http\Controllers\v2\DigitalPlatformsController;
use App\Http\Controllers\v2\DspController;
use App\Http\Controllers\v2\EventsController;
use App\Http\Controllers\v2\HomeController;
use App\Http\Controllers\v2\IworkerController;
use App\Http\Controllers\v2\MsmeController;
use App\Http\Controllers\v2\OpportunitiesController;
use App\Http\Middleware\v2\EnsureClientHasRegistrationType;
use App\Http\Livewire\Frontend\Application;
use App\Http\Livewire\Frontend\Applicants;
use App\Http\Livewire\Frontend\DetailedApplication;
use App\Http\Livewire\V2\ViewDiscountController;
Route::group(['as' => 'v2.'], function () {
    Route::get('/apply', Application::class)->name('apply');
    Route::get('/apply/{application}', DetailedApplication::class)->name('detailed.apply');


    Route::get('application/success', function(){
        return view('livewire.frontend.success');
    })->name('application.success');

    //  excel exports
    Route::get('export', Applicants::class)->name('export');
    // ============================================
    Route::get('/', [HomeController::class, 'index'])->name('home')

        ->middleware(EnsureClientHasRegistrationType::class);
    Route::get('/apis', [ApisController::class, 'index'])->name('apis');
    Route::get('/apis/{id}/details', [ApisController::class, 'details'])->name('apis.details');

    Route::get('/platform/{id}/details', [DigitalPlatformsController::class, 'details'])->name('platforms.details');
    Route::get('/opportunity/{id}/details', [OpportunitiesController::class, 'details'])->name('opportunity.details');
    Route::get('/events/{id}/details', [EventsController::class, 'details'])->name('event.details');

    Route::get('/client/{client}/details', [HomeController::class, 'clientDetails'])->name('client.details');

    Route::get('/dsp/{client}/details', [DspController::class, 'details'])->name('dsp.details');
    Route::get('/iworker/{client}/details', [IworkerController::class, 'details'])->name('iworker.details');
    Route::get('/msme/{client}/details', [MsmeController::class, 'details'])->name('msme.details');

    Route::get('/join-as', [HomeController::class, 'joinAs'])->name('join.as');
    Route::get('/profile', [HomeController::class, 'profile'])->name('auth.profile');
    Route::get('/how-it-works', [HomeController::class, 'howItWorks'])->name('auth.how.it.works');
    // new added routes
    Route::get('/viewDiscount/{discountId}', [ViewDiscountController::class, 'profile'])->name('auth.profile');

    Route::prefix('client')
        ->group(function () {

            Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

            Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('/login', [LoginController::class, 'login'])->name('login.post');

            Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

            Route::get('/otp-verification', [RegisterController::class, 'otpForm'])->name('otp.form');
            Route::post('/otp-verification', [RegisterController::class, 'otpVerify'])->name('otp.verify');
            Route::get('/otp-resend', [RegisterController::class, 'resendOtp'])->name('otp.resent');

            Route::get('/change/password/{token}/form', [RegisterController::class, 'changePassword'])->name('change.password');
            Route::post('/change-password', [RegisterController::class, 'savePassword'])->name('change.password.store');


            Route::get('/password/reset', [LoginController::class, 'password'])->name('password.request');

            Route::get('/password/reset/{token}', [LoginController::class, 'reset'])->name('password.reset');


            Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.password');
            Route::post('/password/email', [LoginController::class, 'sendPasswordReset'])->name('password.email');
        });


});


