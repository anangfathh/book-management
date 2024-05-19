<?php

namespace App\Http\Controllers;

use App\Models\BookProposal;
use App\Models\User;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookProposalController extends Controller
{
    public function index()
    {
        $bookProposals = BookProposal::with('user', 'category')->get();

        return view('pages.proposal.index', compact('bookProposals'));
    }

    public function create()
    {
        // $users = User::all();
        $bookCategories = BookCategory::all();

        return view('pages.proposal.create', compact('bookCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:book_categories,id',
            'book_title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'book_author' => 'nullable|string|max:255',
            'book_cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'book_description' => 'required|string',
            'book_price' => 'nullable|string|max:255',
            'book_type' => 'required|in:softfile,hardfile',
        ]);

        $bookProposal = new BookProposal();
        $bookProposal->user_id = Auth::user()->id;
        $bookProposal->category_id = $request->category_id;
        $bookProposal->book_title = $request->book_title;
        $bookProposal->publisher = $request->publisher;
        $bookProposal->book_author = $request->book_author;
        if ($request->hasFile('book_cover_path')) {
            $book_cover_path = $request->file('book_cover_path');
            $filename = time() . '.' . $book_cover_path->getClientOriginalExtension();
            $book_cover_path->storeAs('public/book_covers', $filename);
            $bookProposal->book_cover_path = $filename;
        }
        $bookProposal->book_description = $request->book_description;
        $bookProposal->book_price = $request->book_price;
        $bookProposal->book_type = $request->book_type;
        $bookProposal->status = 'pending';
        $bookProposal->save();

        return redirect()->route('proposal.list')->with('success', 'Book proposal created successfully.');
    }

    public function show(BookProposal $bookProposal)
    {
        return view('pages.proposal.show', compact('bookProposal'));
    }

    public function edit(BookProposal $bookProposal)
    {
        $users = User::all();
        $bookCategories = BookCategory::all();

        return view('pages.proposal.edit', compact('bookProposal', 'users', 'bookCategories'));
    }

    public function update(Request $request, BookProposal $bookProposal)
    {
        $request->validate([
            'category_id' => 'required|exists:book_categories,id',
            'book_title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'book_author' => 'nullable|string|max:255',
            'book_cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'book_description' => 'required|string',
            'book_price' => 'nullable|string|max:255',
            'book_type' => 'required|in:softfile,hardfile',
        ]);

        $bookProposal->user_id = Auth::user()->id;
        $bookProposal->category_id = $request->category_id;
        $bookProposal->book_title = $request->book_title;
        $bookProposal->publisher = $request->publisher;
        $bookProposal->book_author = $request->book_author;
        if ($request->hasFile('book_cover_path')) {
            if ($bookProposal->book_cover_path && Storage::exists($bookProposal->book_cover_path)) {
                Storage::delete($bookProposal->book_cover_path);
            }
            $book_cover_path = $request->file('book_cover_path');
            $filename = time() . '.' . $book_cover_path->getClientOriginalExtension();
            $book_cover_path->storeAs('public/book_covers', $filename);
            $bookProposal->book_cover_path = $filename;
        }
        $bookProposal->book_description = $request->book_description;
        $bookProposal->book_price = $request->book_price;
        $bookProposal->book_type = $request->book_type;
        $bookProposal->save();

        return redirect()->route('proposal.list')->with('success', 'Book proposal updated successfully.');
    }

    public function destroy(BookProposal $bookProposal)
    {
        if ($bookProposal->book_cover_path && Storage::exists($bookProposal->book_cover_path)) {
            Storage::delete($bookProposal->book_cover_path);
        }
        $bookProposal->delete();

        return redirect()->route('proposal.list')->with('success', 'Book proposal deleted successfully.');
    }

    public function proposalQueue()
    {
        $bookProposals = BookProposal::where('status', 'pending')->get();

        return view('pages.proposal.admin.queue', compact('bookProposals'));
    }

    public function proposalValidation($id, Request $request)
    {
        $bookProposal = BookProposal::find($id);
        $bookProposal->status = $request->status;
        $bookProposal->save();

        return redirect()->route('proposal.queue')->with('succes', 'Book Proposal status was changed');
    }

    public function activeProposal()
    {
        $bookProposals = BookProposal::where('status', 'approved')->get();
        return view('pages.proposal.admin.active', compact('bookProposals'));
    }

    public function closeProposal($id)
    {
        $bookProposal = BookProposal::find($id);
        $bookProposal->status = 'closed';

        $bookProposal->save();
        return redirect()->route('proposal.active')->with('success', 'Book Proposal status was changed');
    }
}
