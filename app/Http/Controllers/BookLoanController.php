<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookLoans = BookLoan::with(['book', 'user'])->get();

        return view('pages.loan.index', compact('bookLoans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $book = Book::find($id);

        return view('pages.loan.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            // 'user_id' => 'required|exists:users,id',
            'loan_date' => 'required|date',
            'deadline_date' => 'required|date|after:loan_date',
        ]);

        $bookLoan = new BookLoan();
        $bookLoan->book_id = $request->book_id;
        $bookLoan->jumlah = $request->jumlah;
        $bookLoan->user_id = Auth::user()->id;
        $bookLoan->loan_date = Carbon::parse($request->loan_date);
        $bookLoan->deadline_date = Carbon::parse($request->deadline_date);
        $bookLoan->save();

        return redirect()->route('loan.list')->with('success', 'Book loan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookLoan $bookLoan)
    {
        return view('pages.loan.show', compact('bookLoan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookLoan $bookLoan)
    {
        $books = Book::all();
        // $users = User::all();

        return view('book_loans.edit', compact('bookLoan', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookLoan $bookLoan)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'loan_date' => 'required|date',
            'deadline_date' => 'required|date|after:loan_date',
        ]);

        $bookLoan->update($validatedData);

        return redirect()->route('book_loans.index')->with('success', 'Book loan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookLoan $bookLoan)
    {
        $bookLoan->delete();

        return redirect()->route('loan.list')->with('success', 'Book loan deleted successfully.');
    }

    public function loanQueue()
    {
        $bookLoans = BookLoan::where('borrowed_status', 'pending')->get();

        return view('pages.loan.admin.index', compact('bookLoans'));
    }

    public function loanValidation($id, Request $request)
    {
        $bookLoan = BookLoan::find($id);
        $bookLoan->borrowed_status = $request->status;
        $bookLoan->save();

        return redirect()->route('loan.queue')->with('success', 'Book loan validation successfully.');
    }

    public function loanActive()
    {
        $bookLoans = BookLoan::where('borrowed_status', 'borrowed')->get();

        return view('pages.loan.admin.active', compact('bookLoans'));
    }

    public function loanReturn($id)
    {
        $bookLoan = BookLoan::find($id);
        $bookLoan->borrowed_status = 'returned';
        $bookLoan->return_date = now();
        $bookLoan->save();

        return redirect()->route('loan.active')->with('success', 'Book loan returned succesfully');
    }
}