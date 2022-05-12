<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;
use App\Models\Book;

class ReviewController extends Controller
{
    public function create(Book $book){
        $user = Auth::user();

        return view('reviews.create', compact('book', 'user'));
    }

    public function store(ReviewRequest $request, Book $book, User $user){
        Review::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'score' => $request->input('score'),
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);

        return redirect()->route('books.show', $book)->with('flash', '新たなレビューが投稿されました');
    }

    public function edit(Book $book, User $user, Review $review){
        return view('reviews.edit', compact('book', 'user', 'review'));
    }

    public function update(ReviewRequest $request, Book $book, User $user, Review $review){
        $review->title = $request->input('title');
        $review->score = $request->input('score');
        $review->content = $request->input('content');
        $review->user_id = $user->id;
        $review->book_id = $book->id;
        $review->save();

        return redirect('/')->with('flash', 'レビューが更新されました');
    }

    public function destroy(Book $book, User $user, Review $review){
        $review->delete();

        return redirect('/')->with('flash', 'レビューが削除されました');
    }
}
