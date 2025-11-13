<?php

use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CaregiverRequestController;
use App\Http\Controllers\FeesPaymentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPaymentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'Index'])->name('home');
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');
Route::post('/user/login', [UserController::class, 'UserLoginSubmit'])->name('user.login.submit');

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login.submit');
 Route::post('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');


Route::get('/user/register', [UserController::class, 'UserRegister'])->name('user.register');
Route::post('/user/register', [UserController::class, 'UserRegisterSubmit'])->name('user.register.submit');
Route::get('/track-request/{trackingNumber}', [CaregiverRequestController::class, 'trackRequest'])
    ->name('api.track.request');



Route::get('/find-a-caregiver', [UserController::class, 'FindCareGiver'])->name('find.a.caregiver');
Route::get('/healthcare-staffing', [UserController::class, 'healthcareStaff'])->name('healthcare.staffing');
Route::get('/health-plan', [UserController::class, 'healthplan'])->name('health.plan');
Route::get('/healthcare-system', [UserController::class, 'healthsystem'])->name('healthcare.system');
Route::get('/become-a-caregiver', [UserController::class, 'becomecaregiver'])->name('become.a.caregiver');

Route::get('/terms', [UserController::class, 'Terms'])->name('terms');
Route::get('/about-us', [UserController::class, 'About'])->name('about');
Route::get('/privacy', [UserController::class, 'Privacy'])->name('privacy');
Route::get('/contact', [UserController::class, 'Contact'])->name('contact');
Route::post('/contact/store', [UserController::class, 'store'])->name('contact.store');

Route::get('/payment/methods', [PaymentController::class, 'index'])->name('payment.methods');
    Route::post('/payment/submit', [PaymentController::class, 'submit'])->name('payment.submit');
    Route::get('/payment/history', [PaymentController::class, 'history'])->name('payment.history');








Route::middleware(['auth', 'role:admin'])->group(function(){
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

// Admin Routes (protected by auth middleware)

    Route::get('/caregiver-requests', [CaregiverRequestController::class, 'index'])
        ->name('admin.caregiver.requests');
    
    Route::get('/caregiver-request/{id}', [CaregiverRequestController::class, 'show'])
        ->name('admin.caregiver.request.show');
    
    Route::post('/caregiver-request/{id}/status', [CaregiverRequestController::class, 'updateStatus'])
        ->name('admin.caregiver.request.status');
    
    Route::post('/caregiver-request/{id}/note', [CaregiverRequestController::class, 'saveNote'])
        ->name('admin.caregiver.request.note');

        // User List & Management
    Route::get('/users', [AdminUserController::class, 'index'])
        ->name('admin.users.index');
    
    Route::get('/users/{id}', [AdminUserController::class, 'show'])
        ->name('admin.users.show');
    
    Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])
        ->name('admin.users.edit');
    
    Route::put('/users/{id}', [AdminUserController::class, 'update'])
        ->name('admin.users.update');
    
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');
    
    // Status Updates
    Route::post('/users/{id}/application-status', [AdminUserController::class, 'updateApplicationStatus'])
        ->name('admin.users.application-status');
    
    Route::post('/users/{id}/account-status', [AdminUserController::class, 'updateAccountStatus'])
        ->name('admin.users.account-status');
    
    // JSON Field Updates (AJAX)
    Route::post('/users/{id}/update-json-field', [AdminUserController::class, 'updateJsonField'])
        ->name('admin.users.update-json-field');
    
    // Export
    Route::get('/users-export', [AdminUserController::class, 'export'])
        ->name('admin.users.export');




        Route::get('/admin/user-payments', [UserPaymentController::class, 'index'])->name('admin.user.payments');
    Route::get('/admin/user-payments/{id}', [UserPaymentController::class, 'show'])->name('admin.user.payment.show');
    Route::get('/admin/user-payments/{id}/edit', [UserPaymentController::class, 'edit'])->name('admin.user.payment.edit');
    Route::post('/admin/user-payments/{id}/update', [UserPaymentController::class, 'update'])->name('admin.user.payment.update');
    Route::post('/admin/user-payments/{id}/confirm', [UserPaymentController::class, 'confirm'])->name('admin.user.payment.confirm');
    Route::post('/admin/user-payments/{id}/reject', [UserPaymentController::class, 'reject'])->name('admin.user.payment.reject');



        Route::get('/admin/contacts', [AdminController::class, 'allContacts'])->name('admin.all.contacts');
        Route::get('/admin/contact/view/{id}', [AdminController::class, 'viewContact'])->name('admin.view.contact');
        Route::post('/admin/contact/reply/{id}', [AdminController::class, 'replyContact'])->name('admin.reply.contact');
        Route::post('/admin/contact/status/{id}', [AdminController::class, 'updateContactStatus'])->name('admin.update.contact.status');
        Route::get('/admin/contact/delete/{id}', [AdminController::class, 'deleteContact'])->name('admin.delete.contact');



Route::get('/admin/settings', [AdminController::class, 'index'])->name('admin.settings');
        Route::post('/admin/settings/update', [AdminController::class, 'update'])->name('admin.settings.update');
        Route::get('/admin/settings/remove-logo', [AdminController::class, 'removeLogo'])->name('admin.settings.remove.logo');
        Route::get('/admin/settings/remove-favicon', [AdminController::class, 'removeFavicon'])->name('admin.settings.remove.favicon');

   });








    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::post('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');



Route::post('/caregiver-request/start', [CaregiverRequestController::class, 'start'])
    ->name('caregiver.request.start');

Route::get('/caregiver-request/resume/{tracking}', [CaregiverRequestController::class, 'resume'])
    ->name('caregiver.request.resume');

Route::post('/caregiver-request/{trackingNumber}/care-needs', [CaregiverRequestController::class, 'updateCareNeeds'])
    ->name('caregiver.request.care-needs');

Route::post('/caregiver-request/{trackingNumber}/experience', [CaregiverRequestController::class, 'updateExperience'])
    ->name('caregiver.request.experience');

Route::post('/caregiver-request/{trackingNumber}/preferences', [CaregiverRequestController::class, 'updatePreferences'])
    ->name('caregiver.request.preferences');

Route::post('/caregiver-request/{trackingNumber}/schedule', [CaregiverRequestController::class, 'updateSchedule'])
    ->name('caregiver.request.schedule');

Route::post('/caregiver-request/{trackingNumber}/complete', [CaregiverRequestController::class, 'complete'])
    ->name('caregiver.request.complete');

Route::post('/caregiver-request/reminder', [CaregiverRequestController::class, 'sendReminder'])
    ->name('caregiver.request.reminder');



    





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
