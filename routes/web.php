<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    JobOfferController,
    TrainingController,
    ContactController,
    ApplicationController,
    CandidateSpaceController,
    GalleryController,
    ProfileController
};
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    HomeController as AdminHomeController,
    ServiceController as AdminServiceController,
    TrainingController as AdminTrainingController,
    PageController as AdminPageController,
    MediaController as AdminMediaController,
    SettingController as AdminSettingController,
    MessageController as AdminMessageController,
    CandidateChatController as AdminCandidateChatController,
    ApplicationController as AdminApplicationController,
    UserController as AdminUserController,
    GalleryController as AdminGalleryController,
    JobOfferController as AdminJobOfferController
};

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pages/{page}', [HomeController::class, 'page'])->name('page.show');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/services', fn() => view('pages.services'))->name('services');
Route::get('/offres', [JobOfferController::class, 'index'])->name('jobs');
Route::get('/offres/{jobOffer}', [JobOfferController::class, 'show'])->name('jobs.show');
Route::get('/formations', [TrainingController::class, 'index'])->name('trainings.index');
Route::get('/formations/{training}', [TrainingController::class, 'show'])->name('trainings.show');
Route::get('/galerie', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galerie/{album}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/postuler/{jobOffer?}', [ApplicationController::class, 'create'])->name('apply');
Route::post('/postuler', [ApplicationController::class, 'store'])->name('apply.store');

// Candidate Space Routes
Route::middleware(['auth', 'candidate'])->prefix('mon-espace')->name('candidate.')->group(function () {
    Route::get('/', [CandidateSpaceController::class, 'dashboard'])->name('dashboard');
    Route::post('/messages', [CandidateSpaceController::class, 'sendMessage'])->name('messages.store');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    // Homepage Management
    Route::get('/accueil', [AdminHomeController::class, 'edit'])->name('home.edit');
    Route::put('/accueil', [AdminHomeController::class, 'update'])->name('home.update');

    // Services / Expertises
    Route::get('/services', [AdminServiceController::class, 'index'])->name('services');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{service}', [AdminServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])->name('services.delete');

    // Trainings
    Route::get('/formations', [AdminTrainingController::class, 'index'])->name('trainings');
    Route::post('/formations', [AdminTrainingController::class, 'store'])->name('trainings.store');
    Route::put('/formations/{training}', [AdminTrainingController::class, 'update'])->name('trainings.update');
    Route::delete('/formations/{training}', [AdminTrainingController::class, 'destroy'])->name('trainings.delete');

    // Editorial Pages
    Route::get('/pages', [AdminPageController::class, 'index'])->name('pages');
    Route::post('/pages', [AdminPageController::class, 'store'])->name('pages.store');
    Route::put('/pages/{page}', [AdminPageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}', [AdminPageController::class, 'destroy'])->name('pages.delete');

    // Users Management
    Route::get('/utilisateurs', [AdminUserController::class, 'index'])->name('users');
    Route::patch('/utilisateurs/{user}/statut', [AdminUserController::class, 'toggle'])->name('users.toggle');

    // Media Library
    Route::get('/mediatheque', [AdminMediaController::class, 'index'])->name('media');
    Route::post('/mediatheque', [AdminMediaController::class, 'store'])->name('media.store');
    Route::delete('/mediatheque/{file}', [AdminMediaController::class, 'destroy'])->where('file', '.*')->name('media.delete');

    // Photo Gallery
    Route::get('/galerie', [AdminGalleryController::class, 'index'])->name('gallery');
    Route::post('/galerie', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::put('/galerie/{album}', [AdminGalleryController::class, 'update'])->name('gallery.update');
    Route::post('/galerie/{album}/image-delete', [AdminGalleryController::class, 'deleteImage'])->name('gallery.image.delete');
    Route::delete('/galerie/{album}', [AdminGalleryController::class, 'delete'])->name('gallery.delete');

    // Settings
    Route::get('/parametres', [AdminSettingController::class, 'edit'])->name('settings');
    Route::put('/parametres', [AdminSettingController::class, 'update'])->name('settings.update');

    // Contact Messages
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages');
    Route::patch('/messages/{message}/read', [AdminMessageController::class, 'markAsRead'])->name('messages.read');
    Route::post('/messages/{message}/reply', [AdminMessageController::class, 'reply'])->name('messages.reply');

    // Candidate Chats
    Route::get('/conversations', [AdminCandidateChatController::class, 'index'])->name('chats');
    Route::post('/conversations/{candidate}', [AdminCandidateChatController::class, 'reply'])->name('chats.reply');

    // Applications
    Route::get('/candidatures', [AdminApplicationController::class, 'index'])->name('applications');
    Route::patch('/candidatures/{application}/status', [AdminApplicationController::class, 'updateStatus'])->name('applications.status');
    Route::get('/candidatures/{application}/download/{type}', [AdminApplicationController::class, 'download'])->where('type', 'cv|letter')->name('applications.download');

    // Job Offers
    Route::resource('jobs', AdminJobOfferController::class)->names('jobs');
});
