<?php

use App\Http\Controllers\AboutPageTabController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\HomeHeaderSliderController;
use App\Http\Controllers\RealtimeNotificationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppLinkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppServiceController;
use App\Http\Controllers\HealthPackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\ContactController;
use App\Services\Helpers;
use App\Services\DynamicRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('force-clear', function () {
    $url = url()->previous();
    Artisan::call('optimize:clear');
    return redirect($url);
})->name('clear');

Route::get('under-construction/', function () {
    return '<h1>We are Under Maintenance. Will be Back Soon!</h1>';
})->name('under.construction');

Route::get('clear', function () {
    $url = url()->previous();
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect($url);
})->name('clear');

Route::get('lang/change', [WebsiteController::class, 'languageChange'])->name('changeLang');

//======Frontend========//
Route::get('/', [WebsiteController::class, 'home'])->name('/');
Route::get('/home', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/doctors', [DoctorController::class, 'doctors'])->name('doctors');
Route::get('/doctors/details/{id}', [DoctorController::class, 'doctorDetails'])->name('doctor.details');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/contact', [ContactController::class, 'createForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'ContactUsForm'])->name('contact.store');
Route::get('/department/details/{id}', [DepartmentController::class, 'show'])->name('department.details');
Route::post('/appointment/store', [DoctorAppointmentController::class, 'store'])->name('appointment.store');

Route::get('insurances', [WebsiteController::class, 'healthInsurances'])->name('healthInsurances');
Route::get('health-packages', [WebsiteController::class, 'healthPackages'])->name('healthPackages');
Route::get('photo-gallery', [WebsiteController::class, 'photoGallery'])->name('photo.gallery');
Route::get('video-gallery', [WebsiteController::class, 'videoGallery'])->name('videoGallery');

Route::get('terms-and-condition', [WebsiteController::class, 'termsCondition'])->name('termsCondition');
Route::get('privacy-policy', [WebsiteController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('cookie-policy', [WebsiteController::class, 'cookiePolicy'])->name('cookiePolicy');

Route::get('/blogs', [BlogController::class, 'blogList'])->name('blogList');
Route::get('/blogs/category/{id}', [BlogController::class, 'blogCategory'])->name('blogs.category');

Route::get('/blog/details/{id}', [BlogController::class, 'details'])->name('blog.details');
Route::get('/logout', [AppServiceController::class, 'logout'])->name('logout.frontend');
Route::post('/user-registration', [AppServiceController::class, 'registration'])->name('userRegistration');


//========Backend=======//
Route::middleware('auth')->group(function () {
    Route::get('/redirect', [DashboardController::class, 'index'])->name('redirect');

    $prefix = request()->segment(1);
    $roleIndex = array_search($prefix, DynamicRole::$prefixes);
    $prefix = $roleIndex !== false ? DynamicRole::$prefixes[$roleIndex] : 'admin';

    Helpers::$prefix = $prefix;
    Route::group(['prefix' => $prefix, 'middleware' => ['access'], ['auth:sanctum', 'verified']], function () {

        Route::get('/', [DashboardController::class, 'dynamicDashboard'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'dynamicDashboard'])->name('dashboard');

        //==========User=========//
        Route::resource('users', UserController::class);

        //=====Profile=====//
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::post('/credential/update', [UserController::class, 'credentialUpdate'])->name('credential.update');

        //=======Realtime notification======//
        Route::resource('notifications', RealtimeNotificationController::class);
        Route::post('user-count', [UserController::class, 'userCountByCondition'])->name('user.count');
        Route::post('notification/image/upload', [RealtimeNotificationController::class, 'imageUpload'])->name('notification.image.upload');

        //---------------------------------------------------------------------------------------------------------------------------------------------------------------//



        //=======Category======//
        Route::resource('categories', CategoryController::class);

        //=======Doctor======//
        Route::resource('doctors', DoctorController::class);

        //=======Department======//
        Route::resource('departments', DepartMentController::class);

        //=======Service======//
        Route::resource('services', ServiceController::class);

        //=======Appointment======//
        Route::get('appointment-list', [DoctorAppointmentController::class, 'AppointmentList'])->name('appointment.list');

        //=======Health Package======//
        Route::resource('health-packages', HealthPackageController::class)->parameters(['health-packages' => 'healthPackage']);

        //=======User contact emails======//
        Route::resource('contacts', ContactController::class);

        //=======Video Gallery======//
        Route::resource('video-galleries', VideoGalleryController::class)->parameters(['video-galleries' => 'videoGallery']);

        //=======About Page Tab======//
        Route::resource('about-page-tabs', AboutPageTabController::class)->parameters(['about-page-tabs' => 'aboutPageTab']);

        //=======Blog======//
        Route::resource('blogs', BlogController::class);

        //=======Home Page========//
        Route::resource('home-page-sliders', HomeHeaderSliderController::class)->parameters(['home-page-sliders' => 'homeHeaderSlider']);
        Route::resource('settings', SettingController::class);
        Route::get('suncity-dental-care', [SettingController::class, 'sunCityDentalCare'])->name('sunCityDentalCare');
        Route::get('consult-doctors', [SettingController::class, 'consultDoctors'])->name('consultDoctors');

        Route::post('settings-sync', [SettingController::class, 'settingSync'])->name('settingSync');
        Route::get('why-choose-us', [SettingController::class, 'whyChooseUs'])->name('whyChooseUs');
        Route::get('business-info', [SettingController::class, 'businessInfo'])->name('businessInfo');
        Route::get('premier-partner', [SettingController::class, 'premierPartner'])->name('premierPartner');
        Route::get('health-insurance', [SettingController::class, 'healthInsurance'])->name('healthInsurance');
        Route::get('photo-gallery', [SettingController::class, 'photoGallery'])->name('photoGallery');

        //===========Contact Info set===========//
        Route::get('contact-info', [SettingController::class, 'contactInfo'])->name('contactInfo');

        //===========Logo & favicon===========//
        Route::get('logo-favicon', [SettingController::class, 'logoFavicon'])->name('logoFavicon');

        //=========Testimonials===========//
        Route::resource('testimonials', TestimonialController::class);
    });

    //==========ckeditor File Upload Handler=========//
    Route::post('file-upload-from-ckeditor', [AppServiceController::class, 'ckeditorFileUpload'])->name('ckeditor.upload');
    //==========End=========//
});
