<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('validation', 1)->get();
        return view('pages.book.index', compact('books'));
    }

    public function create()
    {
        $categories = BookCategory::all();
        return view('pages.book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'category_id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_path' => 'nullable|file|mimes:pdf|max:102400',
            'jumlah' => 'required'
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->category_id = $request->category_id;
        $book->jenis = $request->jenis;
        $book->jumlah = $request->jumlah;
        // $book->user_id = Auth::user()->id;

        if ($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');
            $filename = time() . '.' . $image_path->getClientOriginalExtension();
            $image_path->storeAs('public/cover_images', $filename);
            $book->image_path = $filename;
        }

        if ($request->hasFile('pdf_path')) {
            $pdf_path = $request->file('pdf_path');
            $filename = time() . '.' . $pdf_path->getClientOriginalExtension();
            $pdf_path->storeAs('public/cover_images', $filename);
            $book->pdf_path = $filename;
        }

        $book->save();

        return redirect()->route('books.list')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('pages.book.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = BookCategory::all();
        return view('pages.book.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'category_id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_path' => 'nullable|file|mimes:pdf|max:102400'
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->category_id = $request->category_id;
        $book->jenis = $request->jenis;
        $book->jumlah = $request->jumlah;

        if ($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');
            $filename = time() . '.' . $image_path->getClientOriginalExtension();
            $image_path->storeAs('public/cover_images', $filename);
            $book->image_path = $filename;
        }

        if ($request->hasFile('pdf_path')) {
            $pdf_path = $request->file('pdf_path');
            $filename = time() . '.' . $pdf_path->getClientOriginalExtension();
            $pdf_path->storeAs('public/pdf_files', $filename);
            $book->pdf_path = $filename;
        }

        $book->save();

        return redirect()->route('books.list')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.list')->with('success', 'Book deleted successfully.');
    }

    public function download($id)
    {
        $book = Book::findOrFail($id);

        return response()->download(public_path('storage/pdf_files/' . $book->pdf_path), $book->title . '.pdf');
    }
}