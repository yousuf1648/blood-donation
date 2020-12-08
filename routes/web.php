<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LogoutController;
use Illuminate\Support\Facades\Auth;

// TODO: Admin
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ThanaController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\PostcodeController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\DonorController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\WebsiteController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\BloodRequestControllers;
use App\Http\Controllers\Backend\BloodBankController;
use App\Http\Controllers\Backend\FqaController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\HomeController;

// TODO: Frontend Routes----------------------
use App\Http\Controllers\Frontend\DonorsController;
use App\Http\Controllers\Frontend\BloodNeedController;
use App\Http\Controllers\Frontend\BloodRequestController;
use App\Http\Controllers\Frontend\DonorsRegistrationController;



// TODO: Routes Start From Here-------------------------------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/area-thana', [HomeController::class, 'area_thana'])->name('area.thana');

// TODO: Front end donor routes------------------------
Route::get('/blood-donor', [DonorsController::class, 'index'])->name("blood.donor");

// TODO: Front end donor routes------------------------
Route::get('/need-blood', [BloodNeedController::class, 'index'])->name("blood.need");

// TODO: Front end blood request routes------------------------
Route::get('/blood-request', [BloodRequestController::class, 'index'])->name("blood.request");
Route::post('/blood-request-store', [BloodRequestController::class, 'store'])->name("blood.request.store");
Route::get('/blood-request-confirm', [BloodRequestController::class, 'request_confirm'])->name("blood.request.confirm");

// TODO: Front end donor registration routes------------------------
Route::get('/donor-registration', [DonorsRegistrationController::class, 'index'])->name("donor.registration");
Route::post('/blood-donor-before-registration', [DonorsRegistrationController::class, 'registration_first_stage'])->name("donor.beforeregistration");
Route::get('/donor-final-registration', [DonorsRegistrationController::class, 'donorregistrationfinal'])->name("donor.donorregistrationfinal");
Route::post('/donor-postcode', [DonorsRegistrationController::class, 'donor_postcode'])->name('donor.postcode');
Route::post('/donor-area', [DonorsRegistrationController::class, 'donor_area'])->name('donor.area');
Route::post('/donor-store', [DonorsRegistrationController::class, 'store'])->name("donor.store");
Route::get('/donor-registration-confirm', [DonorsRegistrationController::class, 'registration_confirm'])->name("donor.registration.confirm");

Auth::routes();

// TODO: Admin Routes---------------------------------------------
Route::group(['prefix' => 'admin','as' => 'admin.','middleware'=>['auth','admin']], function () {
    // TODO: Dashboard route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // TODO: Role Routes
    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::post('role-store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role-update-{id}', [RoleController::class, 'update'])->name('role.update');

    // TODO:User Routes
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('user-store', [UserController::class, 'store'])->name('user.store');
    Route::get('user-edit-{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user-update-{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user-delete-{id}', [UserController::class, 'destroy'])->name('user.delete');

    // TODO: Division Routes
    Route::get('division', [DivisionController::class, 'index'])->name('division');
    Route::post('division-store', [DivisionController::class, 'store'])->name('division.store');
    Route::post('division-update-{id}', [DivisionController::class, 'update'])->name('division.update');
    Route::get('division-delete-{id}', [DivisionController::class, 'destroy'])->name('division.delete');

    // TODO: District Routes
    Route::get('district', [DistrictController::class, 'index'])->name('district');
    Route::post('district-store', [DistrictController::class, 'store'])->name('district.store');
    Route::post('district-update-{id}', [DistrictController::class, 'update'])->name('district.update');
    Route::get('district-delete-{id}', [DistrictController::class, 'destroy'])->name('district.delete');

    // TODO: Thana Routes
    Route::get('thana', [ThanaController::class, 'index'])->name('thana');
    Route::post('thana-store', [ThanaController::class, 'store'])->name('thana.store');
    Route::post('thana-update-{id}', [ThanaController::class, 'update'])->name('thana.update');
    Route::get('thana-delete-{id}', [ThanaController::class, 'destroy'])->name('thana.delete');

    // TODO: Postcode Routes
    Route::get('postcode', [PostcodeController::class, 'index'])->name('postcode');
    Route::post('postcode-store', [PostcodeController::class, 'store'])->name('postcode.store');
    Route::post('postcode-update-{id}', [PostcodeController::class, 'update'])->name('postcode.update');
    Route::get('postcode-delete-{id}', [PostcodeController::class, 'destroy'])->name('postcode.delete');

    // TODO: Area Routes
    Route::get('area', [AreaController::class, 'index'])->name('area');
    Route::post('area-store', [AreaController::class, 'store'])->name('area.store');
    Route::post('area-update-{id}', [AreaController::class, 'update'])->name('area.update');
    Route::get('area-delete-{id}', [AreaController::class, 'destroy'])->name('area.delete');

    // TODO: Donor Routes
    Route::get('donor', [DonorController::class, 'index'])->name('donor');
    Route::get('donor-create', [DonorController::class, 'create'])->name('donor.create');
    Route::post('donor-registration-firststage', [DonorController::class, 'first_stage'])->name('donor.beforeregistration');
    Route::get('donor-create-final', [DonorController::class, 'createfinal'])->name('donor.createfinal');
    Route::post('donor-postcode', [DonorController::class, 'donor_postcode'])->name('donor.postcode');
    Route::post('donor-area', [DonorController::class, 'donor_area'])->name('donor.area');
    Route::post('donor-store', [DonorController::class, 'store'])->name('donor.store');
    Route::post('donor-activity', [DonorController::class, 'donor_activity'])->name('donor.activity');
    Route::get('donor-edit-{id}', [DonorController::class, 'edit'])->name('donor.edit');
    Route::post('donor-update-{id}', [DonorController::class, 'update'])->name('donor.update');
    Route::get('donor-delete-{id}', [DonorController::class, 'destroy'])->name('donor.delete');
    Route::get('donor-active', [DonorController::class, 'donor_active'])->name('donor.active');
    Route::get('donor-inactive', [DonorController::class, 'donor_inactive'])->name('donor.inactive');

    // TODO: Blood Request Routes
    Route::get('bloodrequest', [BloodRequestControllers::class, 'index'])->name('bloodrequest');
    Route::post('bloodrequest-activity', [BloodRequestControllers::class, 'bloodrequest_activity'])->name('bloodrequest.activity');
    Route::get('bloodrequest-view-{id}', [BloodRequestControllers::class, 'show'])->name('bloodrequest.view');
    Route::get('bloodrequest-delete-{id}', [BloodRequestControllers::class, 'destroy'])->name('bloodrequest.delete');
    Route::get('approve-blood-request', [BloodRequestControllers::class, 'approverequest'])->name('approverequest');

    // TODO: Blood Bank Routes
    Route::get('bloodbank', [BloodBankController::class, 'index'])->name('bloodbank');
    Route::post('bloodbank-store', [BloodBankController::class, 'store'])->name('bloodbank.store');
    Route::post('bloodbank-update-{id}', [BloodBankController::class, 'update'])->name('bloodbank.update');
    Route::get('bloodbank-delete-{id}', [BloodBankController::class, 'destroy'])->name('bloodbank.delete');
    Route::post('bloodbank-activity', [BloodBankController::class, 'bloodbank_activity'])->name('bloodbank.activity');

    // TODO: FQA Routes
    Route::get('fqa', [FqaController::class, 'index'])->name('fqa');
    Route::post('fqa-store', [FqaController::class, 'store'])->name('fqa.store');
    Route::post('fqa-update-{id}', [FqaController::class, 'update'])->name('fqa.update');
    Route::get('fqa-delete-{id}', [FqaController::class, 'destroy'])->name('fqa.delete');
    Route::post('fqa-activity', [FqaController::class, 'fqa_activity'])->name('fqa.activity');

    // TODO: Blog Route
    Route::get('blog', [BlogController::class, 'index'])->name('blog');
    Route::post('blog-store', [BlogController::class, 'store'])->name('blog.store');
    Route::post('blog-update-{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('blog-delete-{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    Route::post('blog-activity', [BlogController::class, 'blog_activity'])->name('blog.activity');

    // TODO: event Route
    Route::get('event', [EventController::class, 'index'])->name('event');
    Route::post('event-store', [EventController::class, 'store'])->name('event.store');
    Route::post('event-update-{id}', [EventController::class, 'update'])->name('event.update');
    Route::get('event-delete-{id}', [EventController::class, 'destroy'])->name('event.delete');
    Route::post('event-activity', [EventController::class, 'event_activity'])->name('event.activity');





    // TODO: Slider Route
    Route::get('slider', [SliderController::class, 'index'])->name('slider');
    Route::post('slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider-delete-{id}', [SliderController::class, 'destroy'])->name('slider.delete');

    // TODO: Website Route
    Route::get('website', [WebsiteController::class, 'index'])->name('website');
    Route::post('website-update-{id}', [WebsiteController::class, 'update'])->name('website.update');

    // TODO: Profile Route
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile-update-{id}', [ProfileController::class, 'update'])->name('profile.update');

});
