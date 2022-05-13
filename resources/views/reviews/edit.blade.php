<x-app-layout>
<section class="flex justify-center items-center w-[80%] mx-auto mt-10">
    <div class="w-[80%] mx-auto bg-my-light-blue rounded pb-10 space-y-4 border border-gray-100">
        <form method="POST" action="{{ route('books.users.reviews.update', ['book' => $book, 'user' => $user, 'review' => $review]) }}" novalidate">
            @csrf
            @method('patch')
        <div class="mb-4">
            <h2 class="text-xl font-bold text-white bg-my-blue p-2">「{{ $book->title }}」のレビューを編集する</h2>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="w-[80%] mx-auto mt-10">
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" name="title" placeholder="レビュータイトル" value="{{ old('title', $review->title) }}">
        </div>
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="number" name="score" placeholder="スコア(0～100点)" min="0" max="100" value="{{ old('score', $review->score) }}">
        </div>
        <div class="mb-2">
            <textarea class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600 resize-none" name="content" placeholder="レビュー内容" rows="5">{{ old('content', $review->content) }}</textarea>
        </div>
        <div class="mt-4">
            <button class="w-full py-4 bg-my-gray rounded text-sm font-bold transition duration-200">レビューを更新する</button>
        </div>
               </form>
    </div>
    </div>
</section>
</x-app-layout>
