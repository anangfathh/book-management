<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookDonationController;
use App\Http\Controllers\BookProposalController;
use App\Models\BookDonation;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class, [
        'names' => [
            'index' => 'books.list',
            'create' => 'books.create',
            'store' => 'books.store',
            'show' => 'books.show',
            'edit' => 'books.edit',
            'update' => 'books.update',
            'destroy' => 'books.destroy',
            // 'download' => 'books.download',
        ],
    ]);
    Route::resource('book-proposals', BookProposalController::class, [
        'names' => [
            'index' => 'proposal.list',
            'create' => 'proposal.create',
            'store' => 'proposal.store',
            'show' => 'proposal.show',
            'edit' => 'proposal.edit',
            'update' => 'proposal.update',
            'destroy' => 'proposal.destroy',
            // 'download' => 'books.download',
        ],
    ]);
    Route::resource('book-donations', BookDonationController::class, [
        'names' => [
            'index' => 'donation.list',
            'create' => 'donation.create',
            'store' => 'donation.store',
            'show' => 'donation.show',
            'edit' => 'donation.edit',
            'update' => 'donation.update',
            'destroy' => 'donation.destroy',
            // 'download' => 'books.download',
        ],
    ]);
    Route::get('books/{book}/download', [BookController::class, 'download'])->name('books.download');
    Route::get('/donations/queue', [BookDonationController::class, 'donationQueue'])->name('donation.queue');
    Route::post('/donations/{donation}/validation', [BookDonationController::class, 'donationValidation'])
        ->name('donation.validation');
    Route::get('/proposals/queue', [BookProposalController::class, 'proposalQueue'])->name('proposal.queue');
    Route::post('/proposals/{proposal}/validation', [BookProposalController::class, 'proposalValidation'])
        ->name('proposal.validation');
    Route::get('/proposals/active', [BookProposalController::class, 'activeProposal'])->name('proposal.active');
    Route::post('/proposals/{proposal}/closed', [BookProposalController::class, 'closeProposal'])
        ->name('proposal.closed');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
