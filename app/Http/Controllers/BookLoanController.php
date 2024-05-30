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
        if (Auth::user()->role === 'admin') {
            $bookLoans = BookLoan::with(['book', 'user'])->get();
        } else {
            $bookLoans = BookLoan::with(['book', 'user'])->where('user_id', Auth::user()->id)->get();
        }

        $queueLoans = BookLoan::where('borrowed_status', 'pending')->get();
        $activeLoans = BookLoan::where('borrowed_status', 'borrowed')->get();


        return view('pages.loan.index', compact('bookLoans', 'activeLoans', 'queueLoans'));
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
        $book = Book::find($bookLoan->book_id);
        $book->jumlah -= $bookLoan->jumlah;
        $book->save();
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
        if (Auth::user()->role === 'admin') {
            $bookLoans = BookLoan::with(['book', 'user'])->get();
        } else {
            $bookLoans = BookLoan::with(['book', 'user'])->where('user_id', Auth::user()->id)->get();
        }
        $activeLoans = BookLoan::where('borrowed_status', 'borrowed')->get();
        $queueLoans = BookLoan::where('borrowed_status', 'pending')->get();
        return view('pages.loan.index', compact('bookLoans', 'activeLoans', 'queueLoans'));
    }

    public function loanValidation($id, Request $request)
    {
        $bookLoan = BookLoan::find($id);
        $bookLoan->borrowed_status = $request->status;
        if ($bookLoan->borrowed_status === 'rejected') {
            $book = Book::find($bookLoan->book_id);
            $book->jumlah += $bookLoan->jumlah;
            $book->save();
        }
        $bookLoan->save();

        return redirect()->route('loan.list')->with('success', 'Book loan validation successfully.');
    }

    public function loanActive()
    {
        if (Auth::user()->role === 'admin') {
            $bookLoans = BookLoan::with(['book', 'user'])->get();
        } else {
            $bookLoans = BookLoan::with(['book', 'user'])->where('user_id', Auth::user()->id)->get();
        }
        $queueLoans = BookLoan::where('borrowed_status', 'pending')->get();
        $activeLoans = BookLoan::where('borrowed_status', 'borrowed')->get();

        return view('pages.loan.index', compact('activeLoans', 'bookLoans', 'queueLoans'));
    }

    public function loanReturn($id)
    {
        $bookLoans = BookLoan::with(['book', 'user'])->get();
        $activeLoans = BookLoan::where('borrowed_status', 'borrowed')->get();

        $activeLoans = BookLoan::find($id);
        $activeLoans->borrowed_status = 'returned';
        $activeLoans->return_date = now();
        $book = Book::find($activeLoans->book_id);
        $book->jumlah += $activeLoans->jumlah;
        $book->save();
        $activeLoans->save();

        return redirect()->route('loan.active')
            ->with([
                'success' => 'Book loan returned successfully',
                'activeLoans' => $activeLoans,
                'bookLoans' => $bookLoans
            ]);
    }
}
