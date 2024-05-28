<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\BookProposal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $startOfLastWeek = Carbon::now()->subDays(6)->startOfDay(); // Hari ini dikurangi 6 hari untuk mendapatkan awal minggu lalu
        $endOfLastWeek = Carbon::now()->endOfDay(); // Hari ini sebagai akhir periode

        // Hitung jumlah buku yang divalidasi dan diinputkan dalam 7 hari terakhir
        $newbooksCount = Book::where('validation', 1)
                    ->whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])
                    ->count();
        $totalUser =  User::all()->count();
        $totalProposals = BookProposal::with('user', 'category')->count();
        $queueProposals = BookProposal::where('status', 'pending')->count();
        $booksCount = Book::where('validation', 1)->count();
        $books = Book::where('validation', 1)->take(6)->get();
        $bookProposals = BookProposal::where('status', 'pending')->take(6)->get();
        return view('dashboard', compact('books', 'bookProposals', 'booksCount', 'newbooksCount', 'totalProposals', 'queueProposals', 'totalUser'));
    }
}