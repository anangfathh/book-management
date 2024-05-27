<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookDonation;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookPublisher;
use Illuminate\Support\Facades\Auth;

class BookDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $queueDonations = BookDonation::where('status', 'pending')->get();
        if (Auth::user()->role === 'admin') {
            $bookDonations = BookDonation::all();
        } else {
            $bookDonations = BookDonation::where('user_id', Auth::user()->id)->with('user', 'book')->get();
        }
        return view('pages.donation.index', compact('bookDonations', 'queueDonations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BookCategory::all();
        $publishers = BookPublisher::all();
        return view('pages.donation.create', compact('categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher_id' => 'required',
            'category_id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_path' => 'nullable|file|mimes:pdf|max:102400'
        ]);

        $books = Book::all();
        $bookDonation = new BookDonation();
        $bookDonation->user_id = Auth::user()->id;
        $bookDonation->jumlah = $request->jumlah;
        // $bookDonation->status = 'pending';

        $books = Book::all();

        $found = false;

        foreach ($books as $bookcheck) {
            if (trim(strtolower($request->title)) === trim(strtolower($bookcheck->title)) && $bookcheck->jenis === $request->jenis) {
                $found = true;
                break;
            }
        }

        if ($found) {
            $bookDonation->book_id = $bookcheck->id;
        } else {
            // Jika tidak ada buku dengan judul dan jenis yang sama, akan sampai sini
            $book = new Book;
            $book->title = $request->title;
            $book->author = $request->author;
            $book->publication_year = $request->publication_year;
            $book->category_id = $request->category_id;
            $book->jenis = $request->jenis;

            if ($request->publisher_id === 'more') {
                $publisher = new BookPublisher();
                $publisher->name = $request->publisher_name;
                $publisher->address = $request->publisher_address;
                $publisher->phone = $request->publisher_phone;
                $publisher->save();
                $book->publisher_id = $publisher->id;
            } else {
                $book->publisher_id = $request->publisher_id;
            }

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
            $bookDonation->book_id = $book->id;
        }
        // $book = new Book();

        $bookDonation->save();

        return redirect()->route('donation.list')->with('success', 'Book donation created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookDonation = BookDonation::find($id);
        return view('pages.donation.show', compact('bookDonation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookDonation = BookDonation::find($id);
        $categories = BookCategory::all();
        $publishers = BookPublisher::all();
        return view('pages.donation.edit', compact('bookDonation', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher_id' => 'required',
            'publication_year' => 'required',
            'category_id' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf_path' => 'nullable|file|mimes:pdf|max:102400'
        ]);
        $bookDonation = BookDonation::find($id);
        $book = Book::find($bookDonation->book->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication_year = $request->publication_year;
        $book->category_id = $request->category_id;
        $book->jenis = $request->jenis;

        if ($request->publisher_id === 'more') {
            $publisher = new BookPublisher();
            $publisher->name = $request->publisher_name;
            $publisher->address = $request->publisher_address;
            $publisher->phone = $request->publisher_phone;
            $publisher->save();
            $book->publisher_id = $publisher->id;
        } else {
            $book->publisher_id = $request->publisher_id;
        }

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
        // $bookDonation = new BookDonation();
        // $bookDonation->user_id = Auth::user()->id;
        // $bookDonation->book_id = $book->id;
        // $bookDonation->status = 'pending';
        $bookDonation->jumlah = $request->jumlah;
        $bookDonation->save();

        return redirect()->route('donation.list')->with('success', 'Book donation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookDonation = BookDonation::find($id);
        $bookDonation->delete();
        return redirect()->route('donation.list')->with('success', 'Book donation deleted successfully');
    }

    public function donationQueue()
    {
        $queueDonations = BookDonation::where('status', 'pending')->get();
        return view('pages.donation.admin.queue', compact('queueDonations'));
    }

    public function donationHistory()
    {
        $bookDonations = BookDonation::all();
        return view('pages.donation.admin.riwayat', compact('bookDonations'));
    }

    public function donationValidation($id, Request $request)
    {
        $queueDonations = BookDonation::find($id);
        $queueDonations->status = $request->status;
        $queueDonations->save();

        if ($request->status === 'accepted') {
            $book = Book::find($queueDonations->book->id);
            $book->jumlah = $book->jumlah + $queueDonations->jumlah;
            $book->validation = 1;
            $book->save();
        }

        return redirect()->route('donation.list')->with('succes', 'Book Donation status was changed');
    }
}