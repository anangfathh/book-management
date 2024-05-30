<?php

use App\Models\BookDonation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookDonationController;
use App\Http\Controllers\BookProposalController;
use App\Models\User;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:dosen'])->group(function () {
    Route::get('books/{book}/loan', [BookLoanController::class, 'create'])->name('loan.make');

    Route::post('/book-loans', [BookLoanController::class, 'store'])->name('loan.store');
    Route::delete('/book-loans/{bookLoan}', [BookLoanController::class, 'destroy'])->name('loan.destroy');
});

Route::get('/books', [BookController::class, 'index'])->name('books.list');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('books/{book}/download', [BookController::class, 'download'])->name('books.download');

     Route::get('/book-loans', [BookLoanController::class, 'index'])->name('loan.list');

    Route::get('/book-loans/{bookLoan}', [BookLoanController::class, 'show'])->name('loan.show');
    Route::get('/book-donations', [BookDonationController::class, 'index'])->name('donation.list');
    Route::get('/book-donations/create', [BookDonationController::class, 'create'])->name('donation.create');
    Route::post('/book-donations', [BookDonationController::class, 'store'])->name('donation.store');
    Route::get('/book-donations/{bookDonation}', [BookDonationController::class, 'show'])->name('donation.show');
    Route::get('/book-donations/{bookDonation}/edit', [BookDonationController::class, 'edit'])->name('donation.edit');
    Route::put('/book-donations/{bookDonation}', [BookDonationController::class, 'update'])->name('donation.update');
    Route::delete('/book-donations/{bookDonation}', [BookDonationController::class, 'destroy'])->name('donation.destroy');

    Route::get('/book-proposals', [BookProposalController::class, 'index'])->name('proposal.list');
    Route::get('/book-proposals/create', [BookProposalController::class, 'create'])->name('proposal.create');
    Route::post('/book-proposals', [BookProposalController::class, 'store'])->name('proposal.store');
    Route::get('/book-proposals/{bookProposal}', [BookProposalController::class, 'show'])->name('proposal.show');
    Route::get('/book-proposals/{bookProposal}/edit', [BookProposalController::class, 'edit'])->name('proposal.edit');
    Route::put('/book-proposals/{bookProposal}', [BookProposalController::class, 'update'])->name('proposal.update');
    Route::delete('/book-proposals/{bookProposal}', [BookProposalController::class, 'destroy'])->name('proposal.destroy');

    Route::get('/book-loans/{bookLoan}/edit', [BookLoanController::class, 'edit'])->name('loan.edit');
    Route::put('/book-loans/{bookLoan}', [BookLoanController::class, 'update'])->name('loan.update');
});


Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/books/create/new', [BookController::class, 'make'])->name('book.make');
    // Route::get('/books/creates', [BookController::class, 'create'])->name('books.create');
    Route::post('/creates', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/donations/queue', [BookDonationController::class, 'donationQueue'])->name('donation.queue');
    Route::get('/donations/history', [BookDonationController::class, 'donationHistory'])->name('donation.history');
    Route::post('/donations/{donation}/validation', [BookDonationController::class, 'donationValidation'])->name('donation.validation');

    Route::get('/proposals/queue', [BookProposalController::class, 'proposalQueue'])->name('proposal.queue');
    Route::post('/proposals/{proposal}/validation', [BookProposalController::class, 'proposalValidation'])->name('proposal.validation');
    Route::get('/proposals/active', [BookProposalController::class, 'activeProposal'])->name('proposal.active');
    Route::post('/proposals/{proposal}/closed', [BookProposalController::class, 'closeProposal'])->name('proposal.closed');

    Route::get('/loans/queue', [BookLoanController::class, 'loanQueue'])->name('loan.queue');
    Route::get('/loans/active', [BookLoanController::class, 'loanActive'])->name('loan.active');
    Route::post('/loans/{loan}/validation', [BookLoanController::class, 'loanValidation'])->name('loan.validation');
    Route::get('/book-loans/{bookLoan}/returned', [BookLoanController::class, 'loanReturn'])->name('loan.return');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users/mahasiswa', [ProfileController::class, 'getMahasiswa'])->name('mahasiswa.list');
    Route::get('/users/dosen', [ProfileController::class, 'getDosen'])->name('dosen.list');
    Route::get('/users/alumni', [ProfileController::class, 'getAlumni'])->name('alumni.list');

    Route::delete('/users/{user}', [ProfileController::class, 'deleteUser'])->name('user.destroy');
});

require __DIR__ . '/auth.php';