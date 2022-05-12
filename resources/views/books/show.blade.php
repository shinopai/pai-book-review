<x-app-layout>
  <!-- flash message -->
  @if(session('flash'))
   <p id="flash" class="text-white text-center p-2 bg-green-400">{{ session('flash') }}</p>
  @endif

  <!-- main -->
  <div class="bg-my-light-blue w-[90%] mx-auto mt-10 py-5 px-5 rounded-lg border border-black">
    <div class="flex justify-between gap-2">
      <div class="w-[60%]">
        <h1 class="bg-my-gray text-lg px-2 p-1 w-fit mb-2 text-gray-800">{{ $book->title }}</h1>
        <h2 class="bg-my-gray px-2 w-fit mb-2 p-1 text-gray-800">{{ $book->publisher->name }}</h2>
        <h2 class="bg-my-gray px-2 inline-block p-1 text-gray-800">{{ $book->genre->name }}</h2>
        <h2 class="bg-my-gray px-2 inline-block p-1 text-gray-800">{{ date_format($book->published_at, 'Y年m月d日') }}</h2>
        <textarea class="w-full p-2 overflow-y-scroll mt-2 resize-none" rows="5" readonly="readonly">{{ $book->explanation }}</textarea>
      </div>
      <div class="w-[40%]">
        <h2 class="bg-my-gray px-2 inline-block p-1 text-gray-800 w-full text-center">レビュー件数:&nbsp;{{ $book->reviews->count() }}件</h2>
        <div class="w-full mt-2 flex text-white">
          <div class="w-1/3 bg-my-blue rounded-lg flex justify-center items-center border py-5">
            <div class="text-center">
              <span class="block">平均値</span>
              <span class="font-bold text-2xl block">{{ $avg }}</span>
            </div>
          </div>
          <div class="w-1/3 bg-my-blue rounded-lg flex justify-center items-center border">
            <div class="text-center">
              <span class="block">トリム</span>
              <span class="font-bold text-2xl block">0</span>
            </div>
          </div>
          <div class="w-1/3 bg-my-blue rounded-lg flex justify-center items-center border">
            <div class="text-center">
              <span class="block">中央値</span>
              <span class="font-bold text-2xl block">{{ $median }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
      <button class="w-[60%] mx-auto block mt-2 py-4 bg-my-gray rounded text-sm transition duration-200">    <a href="{{ route('books.reviews.create', ['book' => $book]) }}">
        このブックのレビューを投稿</a></button>
  </div>
  <div class="bg-my-light-blue w-[90%] mx-auto mt-2 py-5 px-5 rounded-lg border border-black">
    <h1 class="bg-my-gray px-2 inline-block p-1 text-gray-800">最近のレビュー</h1>
    <ul class="mt-5">
      @forelse ($book->reviews as $review)
          <li class="mb-2">
        <div class="flex justify-center w-[90%] mx-auto">
          <div class="w-[15%] bg-my-blue rounded-lg flex justify-center items-center">
            <span class="text-white font-bold text-2xl">{{ $review->score }}</span>
          </div>
          <div class="w-[85%] p-2 rounded-lg border border-black bg-white hover:bg-my-light-blue cursor-pointer">
            <p class="text-lg">{{ $book->title }}</p>
            <p>{{ $review->title }}</p>
            <p class="text-right">
              <span class="mr-2">
                <img src="{{ asset('storage/images/'.$review->user->user_image) }}" alt="{{ $review->user->name }}" srcset="" class="inline-block rounded-full" width="40" height="40">
                {{ $review->user->name }}
              </span>
              <span>このレビューの評価&nbsp;<i class="fa-solid fa-star"></i>2.5</span>
            </p>
          </div>
        </div>
      </li>
      @empty
          <li>レビューはまだありません</li>
      @endforelse
    </ul>
  </div>

  <!-- footer -->
  <footer class="bg-[#404040] w-[90%] rounded-lg mx-auto text-white py-5">
    <p class="text-center">Copyright&copy; 2022 Privacy Policy</p>
  </footer>
</x-app-layout>
