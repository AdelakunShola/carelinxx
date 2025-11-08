<?php

use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeesPaymentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'Index'])->name('home');
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');
Route::post('/user/login', [UserController::class, 'UserLoginSubmit'])->name('user.login.submit');
Route::get('/user/register', [UserController::class, 'UserRegister'])->name('user.register');
Route::post('/user/register', [UserController::class, 'UserRegisterSubmit'])->name('user.register.submit');



    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::post('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');



Route::get('/find-a-caregiver', [UserController::class, 'FindCareGiver'])->name('find.a.caregiver');
Route::get('/healthcare-staffing', [UserController::class, 'healthcareStaff'])->name('healthcare.staffing');
Route::get('/health-plan', [UserController::class, 'healthplan'])->name('health.plan');
Route::get('/healthcare-system', [UserController::class, 'healthsystem'])->name('healthcare.system');
Route::get('/become-a-caregiver', [UserController::class, 'becomecaregiver'])->name('become.a.caregiver');





Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('/all/jobs', [JobController::class, 'AllJobs'])->name('all.jobs');
Route::get('/add/job', [JobController::class, 'AddJob'])->name('add.job');
Route::post('/store/job', [JobController::class, 'StoreJob'])->name('store.job');
Route::get('/edit/job/{id}', [JobController::class, 'EditJob'])->name('edit.job');
Route::post('/update/job/{id}', [JobController::class, 'UpdateJob'])->name('update.job');
Route::get('/delete/job/{id}', [JobController::class, 'DeleteJob'])->name('delete.job');

// Admin Application Routes (add these in your admin middleware group)
Route::get('/all/applications', [AdminApplicationController::class, 'AllApplications'])->name('all.applications');
Route::get('/view/application/{id}', [AdminApplicationController::class, 'ViewApplication'])->name('view.application');
Route::get('/edit/application/{id}', [AdminApplicationController::class, 'EditApplication'])->name('edit.application');
Route::post('/update/application/{id}', [AdminApplicationController::class, 'UpdateApplication'])->name('update.application');
Route::get('/delete/application/{id}', [AdminApplicationController::class, 'DeleteApplication'])->name('delete.application');
Route::post('/bulk/update/status', [AdminApplicationController::class, 'BulkUpdateStatus'])->name('bulk.update.status');
Route::get('/export/applications', [AdminApplicationController::class, 'ExportApplications'])->name('export.applications');










Route::get('/jobs', [JobController::class, 'index'])->name('user.jobs');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('user.job.details');
    Route::get('/jobs/{id}/apply', [JobController::class, 'apply'])->name('user.job.apply');
    Route::post('/jobs/{id}/apply', [JobController::class, 'applySubmit'])->name('user.job.apply.submit');
    
    // Application Routes
    Route::get('/my-applications', [JobController::class, 'myApplications'])->name('user.applications');
    Route::get('/my-applications/{id}', [JobController::class, 'applicationDetails'])->name('user.application.details');
    Route::post('/my-applications/{id}/withdraw', [JobController::class, 'withdrawApplication'])->name('user.application.withdraw');


Route::get('/all/fees/payments', [FeesPaymentController::class, 'AllFeesPayments'])->name('all.fees.payments');
Route::get('/add/fees/payment', [FeesPaymentController::class, 'AddFeesPayment'])->name('add.fees.payment');
Route::post('/store/fees/payment', [FeesPaymentController::class, 'StoreFeesPayment'])->name('store.fees.payment');
Route::get('/edit/fees/payment/{id}', [FeesPaymentController::class, 'EditFeesPayment'])->name('edit.fees.payment');
Route::post('/update/fees/payment/{id}', [FeesPaymentController::class, 'UpdateFeesPayment'])->name('update.fees.payment');
Route::get('/delete/fees/payment/{id}', [FeesPaymentController::class, 'DeleteFeesPayment'])->name('delete.fees.payment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
