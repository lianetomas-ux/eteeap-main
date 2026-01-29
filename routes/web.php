<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperinceController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessorController;
use App\Http\Controllers\DepartmentCoordinatorController;
use App\Http\Controllers\CollegeCoordinatorController;
use App\Http\Controllers\AcceptedApplicantsController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\InterviewScheduleController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\SettingsController;
use App\Models\Post;
use App\Models\Slider;

// ============================================
// PUBLIC ROUTES (No authentication required)
// ============================================

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/homepage', [HomeController::class, 'showHomePage'])->name('homepage');

// Static pages
Route::view('/mission-vision', 'pages.mission-vision')->name('mission.vision');
Route::view('/admission-requirements', 'pages.admission-requirements')->name('admission.requirements');
Route::view('/qualification', 'pages.qualification')->name('qualification');
Route::view('/procedures', 'pages.procedures')->name('procedures');
Route::get('/courses-offered', [CourseController::class, 'index'])->name('courses.offered');

// ============================================
// GUEST ROUTES (Only for non-logged-in users)
// ============================================

Route::middleware('guest')->group(function () {
    // Terms and Conditions page
    Route::get('/terms', function () {
        return view('auth.terms');
    })->name('terms');

    // Registration routes
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store']);
});

// ============================================
// AUTHENTICATED USER ROUTES
// ============================================

Route::middleware(['auth', 'verified'])->group(function () {
    // Announcements/Posts
    Route::get('/posts', [AnnouncementController::class, 'index'])->name('posts.index');

    // Application form steps
    Route::get('/information', [InformationController::class, 'show'])->name('information');
    Route::get('/education', [EducationController::class, 'show'])->name('education');
    Route::get('/experince', [ExperinceController::class, 'show'])->name('experince');
    Route::get('/awards', [AwardsController::class, 'show'])->name('awards');
    Route::get('/work', [WorkController::class, 'show'])->name('work');

    // User Application
    Route::get('/application', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/application/store', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/application/{id}/edit', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('application.update');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::get('/application/view/{id}', [ApplicationController::class, 'view'])->name('application.view');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

    // Requirements
    Route::post('/requirement/upload', [RequirementController::class, 'upload'])->name('requirement.upload');

    // Profile
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profile', [UserController::class, 'update'])->name('user.profile.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User dashboard
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/applications', [UserController::class, 'index'])->name('user.applications');
});

// ============================================
// ADMIN ROUTES
// ============================================

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
    
    // Admin user management
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');

    // Announcement management
    Route::resource('admin/announcement', AnnouncementController::class);
    Route::delete('admin/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcement.destroy');
    
    // Slider management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('slider', \App\Http\Controllers\Admin\SliderController::class);
    });

    // Admin application management
    Route::get('/application/{id}', [AdminController::class, 'view'])->name('admin.application.view');
    Route::put('/application/{id}/accept', [AdminController::class, 'accept'])->name('admin.application.accept');
    Route::put('/application/{id}/reject', [AdminController::class, 'reject'])->name('admin.application.reject');
    Route::put('/application/{id}/unreject', [AdminController::class, 'unreject'])->name('admin.application.unreject');
    Route::patch('/application/{id}/mark-reviewed', [AdminController::class, 'markReviewed'])->name('admin.application.mark-reviewed');

    // Schedule management
    Route::get('/admin/schedule/reschedule/{id}', [InterviewScheduleController::class, 'showRescheduleForm'])->name('schedule.reschedule');
    Route::get('/schedule/reschedule/{id}', [InterviewScheduleController::class, 'form'])->name('schedule.reschedule.form');
    Route::get('/admin/schedule/form/{id}', [InterviewScheduleController::class, 'form'])->name('interview.schedule.form');
    Route::get('/admin/accepted-applicants', [AcceptedApplicantsController::class, 'index'])->name('accepted_applicants.index');
    Route::put('/schedule/reschedule/{id}', [InterviewScheduleController::class, 'updateReschedule'])->name('schedule.updateReschedule');
        
    // Accepted applicants
    Route::get('/accepted-applicants', [AcceptedApplicantsController::class, 'index'])->name('admin.accepted.applicants');
    
    // Announcement
    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('admin.announcement.create');
    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
    Route::post('/announcement/upload-image', [AnnouncementController::class, 'uploadImage'])->name('admin.announcement.uploadImage');

    // Image upload (ckeditor)
    Route::post('/ckeditor/upload', [AnnouncementController::class, 'upload'])->name('ckeditor.upload');

    // Course management
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class, ['as' => 'admin']);

    // Export routes
    Route::get('/applications/export/excel', [AdminController::class, 'exportExcel'])->name('admin.applications.exportExcel');
    Route::get('/applications/export', [AdminController::class, 'exportAll'])->name('admin.application.export');
    Route::get('/applications/export/pending', [AdminController::class, 'exportPending'])->name('admin.application.export.pending');
    Route::get('/applications/export/accepted', [AdminController::class, 'exportAccepted'])->name('admin.application.export.accepted');
    Route::get('/applications/export/rejected', [AdminController::class, 'exportRejected'])->name('admin.application.export.rejected');

    // Email compose routes
    Route::post('/compose-email', [AdminController::class, 'composeEmail'])->name('admin.compose.email');
    Route::get('/users/search-for-email', [AdminController::class, 'getUsersForEmail'])->name('admin.users.search.email');
});

// Interview schedule
Route::resource('schedule', InterviewScheduleController::class);
Route::post('/schedule/bulk', [InterviewScheduleController::class, 'bulkSchedule'])->name('schedule.bulk');

// Orientation schedule
use App\Http\Controllers\OrientationScheduleController;
Route::get('/orientation/create', [OrientationScheduleController::class, 'create'])->name('orientation.create');
Route::post('/orientation/store', [OrientationScheduleController::class, 'store'])->name('orientation.store');
Route::get('/orientation/reschedule/{id}', [OrientationScheduleController::class, 'showRescheduleForm'])->name('orientation.reschedule');
Route::put('/orientation/reschedule/{id}', [OrientationScheduleController::class, 'updateReschedule'])->name('orientation.updateReschedule');

// ============================================
// ASSESSOR ROUTES
// ============================================

Route::middleware(['auth'])->prefix('assessor')->group(function () {
    Route::get('/dashboard', [AssessorController::class, 'index'])->name('assessor.dashboard');
    Route::get('/applications', [AssessorController::class, 'applications'])->name('assessor.applications');
    Route::get('/application/{id}', [AssessorController::class, 'view'])->name('assessor.application.view');
    Route::put('/application/{id}/accept', [AssessorController::class, 'accept'])->name('assessor.application.accept');
    Route::put('/application/{id}/reject', [AssessorController::class, 'reject'])->name('assessor.application.reject');
    Route::put('/application/{id}/unreject', [AssessorController::class, 'unreject'])->name('assessor.application.unreject');
    
    // Export routes
    Route::get('/applications/export', [AssessorController::class, 'exportAll'])->name('assessor.application.export');
    Route::get('/applications/export/pending', [AssessorController::class, 'exportPending'])->name('assessor.application.export.pending');
    Route::get('/applications/export/accepted', [AssessorController::class, 'exportAccepted'])->name('assessor.application.export.accepted');
    Route::get('/applications/export/rejected', [AssessorController::class, 'exportRejected'])->name('assessor.application.export.rejected');
});

// ============================================
// DEPARTMENT COORDINATOR ROUTES
// ============================================

Route::middleware(['auth'])->prefix('department')->group(function () {
    Route::get('/dashboard', [DepartmentCoordinatorController::class, 'index'])->name('department.dashboard');
    Route::get('/application/{id}', [DepartmentCoordinatorController::class, 'view'])->name('department.application.view');
    Route::put('/application/{id}/accept', [DepartmentCoordinatorController::class, 'accept'])->name('department.application.accept');
    Route::put('/application/{id}/reject', [DepartmentCoordinatorController::class, 'reject'])->name('department.application.reject');
});

// ============================================
// COLLEGE COORDINATOR ROUTES
// ============================================

Route::middleware(['auth'])->prefix('college')->group(function () {
    Route::get('/dashboard', [CollegeCoordinatorController::class, 'index'])->name('college.dashboard');
    Route::get('/application/{id}', [CollegeCoordinatorController::class, 'view'])->name('college.application.view');
    Route::put('/application/{id}/accept', [CollegeCoordinatorController::class, 'accept'])->name('college.application.accept');
    Route::put('/application/{id}/reject', [CollegeCoordinatorController::class, 'reject'])->name('college.application.reject');
});

// ============================================
// OTHER ROUTES
// ============================================

// Credentials
Route::get('/admin/credentials/view/{id}', [CredentialController::class, 'show'])->name('credentials.view');

// Degree update
Route::put('/admin/applications/{id}/update-degree', [\App\Http\Controllers\Admin\ApplicantController::class, 'updateDegree'])->name('applications.updateDegree');

// Approved applicants
Route::post('/admin/accepted-applicants/approve', [AcceptedApplicantsController::class, 'approve'])->name('accepted_applicants.approve');
Route::get('/admin/approved-applicants', [AcceptedApplicantsController::class, 'approvedList'])->name('approved_applicants.list');

// Test mail
Route::get('/test-mail', function () {
    Mail::raw('Hi World', function ($m) {
        $m->to('juliriya21@gmail.com')->subject('Test Mail');
    });
    return 'Mail sent';
});

require __DIR__.'/auth.php';