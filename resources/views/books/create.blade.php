<x-app-layout>
<section class="flex justify-center items-center w-[80%] mx-auto mt-10">
    <div class="w-[80%] mx-auto bg-my-light-blue rounded pb-10 space-y-4 border border-gray-100">
        <form method="POST" action="{{ route('books.store') }}" novalidate">
            @csrf
        <div class="mb-4">
            <h2 class="text-xl font-bold text-white bg-my-blue p-2">ブック登録</h2>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="w-[80%] mx-auto mt-10">
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="name" name="title" placeholder="書籍名" value="{{ old('title') }}">
        </div>
        <div class="mb-2">
            <textarea class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600 resize-none" name="explanation" placeholder="説明文" rows="5">{{ old(' explanation') }}</textarea>
        </div>
        <div class="mb-2 flex justify-between">
            <div class="w-[40%]">
                <label for="genre">ジャンル</label>
                <select name="genre_id" id="genre">
                    @foreach(config('const.genres') as $genre)
                    <option value="{{ $loop->index + 1 }}">{{ $genre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-grow">
            <label for="publisher">出版社</label>
                <select name="publisher_id" id="publisher">
                    @foreach(config('const.publishers') as $publisher)
                    <option value="{{ $loop->index + 1 }}">{{ $publisher }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="published">出版日</label><br>
            <input type="date" name="published_at" id="published">
        </div>
        <div class="mt-4">
            <button class="w-full py-4 bg-my-gray rounded text-sm font-bold transition duration-200">登録</button>
        </div>
               </form>
    </div>
    </div>
</section>
</x-app-layout>
