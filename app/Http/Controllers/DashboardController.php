<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\BookDonation;
use App\Models\BookProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $proposalChart = BookProposal::all();


        $proposalChartData =  [
            $proposalChart->where('status', 'pending')->count(),
            $proposalChart->where('status', 'approved')->count(),
            $proposalChart->where('status', 'rejected')->count(),
            $proposalChart->where('status', 'closed')->count(),
        ];
        $proposalChartLabel =[
            'Pending',
            'approved',
            'rejected',
            'closed',
        ];


       // Fetch data and group by month
        $donationData = DB::table('book_donations')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        ->groupBy('month')
        ->get();

        // Prepare the data for the chart
        $donationChartData = $donationData->pluck('count')->toArray();
        $donationChartLabels = $donationData->pluck('month')->toArray();



        $proposalLineData = DB::table('book_proposals')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        ->groupBy('month')
        ->get();
        $proposalChartLabels = $proposalLineData->pluck('month')->toArray();
        $proposalLineChart = $proposalLineData->pluck('count')->toArray();



        return view('dashboard', compact('proposalChartLabels', 'donationChartLabels', 'proposalLineChart', 'donationChartData', 'proposalChartLabel','proposalChartData','books', 'bookProposals', 'booksCount', 'newbooksCount', 'totalProposals', 'queueProposals', 'totalUser'));
    }



     public function welcome()
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

        $proposalChart = BookProposal::all();


        $proposalChartData =  [
            $proposalChart->where('status', 'pending')->count(),
            $proposalChart->where('status', 'approved')->count(),
            $proposalChart->where('status', 'rejected')->count(),
            $proposalChart->where('status', 'closed')->count(),
        ];
        $proposalChartLabel =[
            'Pending',
            'approved',
            'rejected',
            'closed',
        ];


       // Fetch data and group by month
        $donationData = DB::table('book_donations')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        ->groupBy('month')
        ->get();

        // Prepare the data for the chart
        $donationChartData = $donationData->pluck('count')->toArray();
        $donationChartLabels = $donationData->pluck('month')->toArray();



        $proposalLineData = DB::table('book_proposals')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
        ->groupBy('month')
        ->get();
        $proposalChartLabels = $proposalLineData->pluck('month')->toArray();
        $proposalLineChart = $proposalLineData->pluck('count')->toArray();



        return view('welcome', compact('proposalChartLabels', 'donationChartLabels', 'proposalLineChart', 'donationChartData', 'proposalChartLabel','proposalChartData','books', 'bookProposals', 'booksCount', 'newbooksCount', 'totalProposals', 'queueProposals', 'totalUser'));
    }
}