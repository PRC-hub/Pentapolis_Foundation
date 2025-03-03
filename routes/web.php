<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\CommunityEngagementController;
use App\Http\Controllers\ServiceDeliveryController;
use App\Http\Controllers\CapacityBuildingController;
use App\Http\Controllers\HumanitarianController;
use App\Http\Controllers\SustainabilityController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InkindController;
use App\Http\Controllers\MonetaryDonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimesheetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpdatePlanController;
use App\Http\Controllers\LocationPhotoController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\GeoTrackingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Partners_SeeMoreController;
use App\Http\Controllers\ProfileDashboardController;
use App\Http\Controllers\SalespersonLocationController;
use App\Http\Controllers\GalleryController;




/// ---------------------- Public Routes (No Authentication Required) ---------------------- ///

// Home & Static Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'aboutUs'])->name('about-us');
Route::get('/help-us', [HelpController::class, 'help'])->name('help-us');
Route::get('/community-engagement', [CommunityEngagementController::class, 'community'])->name('community-engagement');
Route::get('/service-delivery', [ServiceDeliveryController::class, 'serviceDelivery'])->name('service');
Route::get('/capacity-building', [CapacityBuildingController::class, 'capacity'])->name('capacity-building');
Route::get('/humanitarian-assistance', [HumanitarianController::class, 'humanitarian'])->name('humanitarian-assistance');
Route::get('/sustainable-development', [SustainabilityController::class, 'sustainability'])->name('sustainable-development');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('privacy.policy');
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('terms');

// Donations & Volunteer
Route::get('/monetary-donation', [MonetaryDonationController::class, 'showForm'])->name('monetary.form');
Route::post('/monetary-donation', [MonetaryDonationController::class, 'submitForm'])->name('monetary.submit');
Route::get('/inkind', [InkindController::class, 'showForm'])->name('donation.form');
Route::post('/inkind-donation/submit', [InkindController::class, 'submitForm'])->name('donation.submit');
Route::get('/volunteering', [VolunteerController::class, 'create'])->name('volunteer.create');
Route::post('/volunteering', [VolunteerController::class, 'store'])->name('volunteer.store');
Route::get('/gallery/load-more', [GalleryController::class, 'loadMore'])->name('gallery.loadMore');
Route::post('/volunteer/store', [VolunteerController::class, 'store'])->name('volunteer.store');

// Contact & Blog
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// Partner Details
Route::get('/partners-clients/see-more', [Partners_SeeMoreController::class, 'partnersSeeMore'])->name('partners.see-more');


/// ---------------------- Authentication Routes (Guest Middleware) ---------------------- ///
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'login_post'])->name('login_post');
    Route::get('/signUp', [SignUpController::class, 'show'])->name('signup.show');
    Route::post('/signup', [SignUpController::class, 'register'])->name('register');
    Route::post('/send-email-otp', [OtpController::class, 'sendEmailOtp'])->name('send.email.otp');
});

/// ---------------------- Logout Route ---------------------- ///
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate(); 
    session()->regenerateToken(); 
    return redirect('/')->with('success', 'Logged out successfully');
})->name('logout')->middleware('auth');


/// ---------------------- Private Routes (Authenticated Users) ---------------------- ///
Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile-Dashboard', [ProfileDashboardController::class, 'dashboard'])->name('profile.dashboard');

    // Task & Timesheets
    Route::get('/task', [TaskController::class, 'task'])->name('task');
    Route::get('/timesheet', [TimesheetController::class, 'showTimesheet'])->name('timesheet.show');
    Route::post('/timesheet', [TimesheetController::class, 'submitTimesheet'])->name('timesheet.submit');
    Route::get('/history', [TimesheetController::class, 'history'])->name('history');
    Route::post('/move-to-history', [TimesheetController::class, 'moveToHistory'])->name('moveToHistory');

    // Invoices & Photos
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('/invoices/upload', [InvoiceController::class, 'upload'])->name('invoices.upload');
    Route::get('/photos', [LocationPhotoController::class, 'index'])->name('photos.index');
    Route::post('/photos/upload', [LocationPhotoController::class, 'upload'])->name('photos.upload');

    // Sales & Updates
    Route::get('/sales', [UpdatePlanController::class, 'showSales'])->name('sales.show');
    Route::post('/sales/update', [UpdatePlanController::class, 'updateSales'])->name('sales.update');

    // Help Center
    Route::get('/help-center', [HelpCenterController::class, 'help'])->name('help-center');
    Route::post('/help-center/feedback', [HelpCenterController::class, 'storeFeedback'])->name('help-center.feedback');

    // Real-time Location Tracking 
    Route::post('/update-location', [SalespersonLocationController::class, 'updateLocation']);
    Route::get('/get-locations', [SalespersonLocationController::class, 'getLocations']);
    Route::get('/geolocation', function () {
        return view('geolocation');
    })->name('geolocation');
    
});

