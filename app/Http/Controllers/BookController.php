<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Review;
use My_func;

class BookController extends Controller
{
    public function index(){
        $reviews = Review::latest()->limit(20)->get();

        return view('books.index', compact('reviews'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(BookRequest $request){
        Book::create([
            'title' => $request->input('title'),
            'explanation' => $request->input('explanation'),
            'published_at' => $request->input('published_at'),
            'genre_id' => $request->input('genre_id'),
            'publisher_id' => $request->input('publisher_id'),
            'published_at' => $request->input('published_at')
        ]);

        return redirect('/')->with('flash', '新たなブックが登録されました');
    }

    public function search(Request $request){
        $books = Book::where('title', 'LIKE', '%'.$request->input('q_word').'%')->get();
        $books->load('genre', 'publisher', 'reviews');

        return view('books.search', compact('books'));
    }

    public function show(Book $book){
        $book->load('genre', 'publisher', 'reviews');

        $avg = My_func::getAvg($book->reviews->sum('score'), $book->reviews->count());

        $medianArr = array();
        foreach($book->reviews as $review){
          array_push($medianArr, $review->score);
        }
        $median = My_func::getMedian(collect($medianArr));

        return view('books.show', compact('book', 'avg', 'median'));
    }
}
