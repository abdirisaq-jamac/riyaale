<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return redirect()->route('filament.admin.auth.login');
})->name('login');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Students
Route::resource('students', StudentController::class);

// Courses
Route::resource('courses', CourseController::class);

// Attendances
Route::resource('attendances', AttendanceController::class);

// Settings (Sitting)
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

// Reports
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/semester', [ReportController::class, 'bySemester'])->name('reports.semester');
Route::get('/reports/course', [ReportController::class, 'byCourse'])->name('reports.course');
Route::get('/reports/student', [ReportController::class, 'byStudent'])->name('reports.student');

// Semesters
Route::resource('semesters', SemesterController::class);
Route::patch('/semesters/{semester}/status', [SemesterController::class, 'toggleStatus'])->name('semesters.toggle');

// Promotion
Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion.index');
Route::post('/promotion', [PromotionController::class, 'promote'])->name('promotion.store');

// Archives
Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
