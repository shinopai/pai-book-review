<x-app-layout>
  <!-- flash message -->
  @if(session('flash'))
   <p id="flash" class="text-white text-center p-2 bg-green-400">{{ session('flash') }}</p>
  @endif

  <!-- main -->
  <div class="bg-my-light-blue w-[80%] mx-auto mt-10 py-5 px-10 rounded-lg border border-black">
    <h1 class="bg-my-gray px-2 inline-block p-1 text-gray-800">
      @if($books->count() == 0)
      ブックは見つかりませんでした
      @else
      {{ $books->count() }}件ヒットしました
      @endif
    </h1>
    <ul class="mt-5">
      @foreach ($books as $book)
          <li class="mb-2">
        <div class="flex justify-center w-[95%] mx-auto">
          <div class="w-[30%] flex text-white">
          <div class="w-1/3 bg-my-blue rounded-lg flex justify-center items-center border">
            <div class="text-center">
              <span class="block">平均値</span>
              <span class="font-bold text-2xl block">0</span>
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
              <span class="font-bold text-2xl block">0</span>
            </div>
          </div>
        </div>
        <div class="flex-grow px-2 py-1 rounded-lg border border-black bg-white hover:bg-my-light-blue">
            <a href="{{ route('books.show', ['book' => $book->id]) }}">
            <p>{{ $book->title }}</p>
            <p>
              <span>{{ $book->publisher->name }}</span>&nbsp;/
              <span>{{ $book->genre->name }}</span>&nbsp;/
              <span>{{ date_format($book->published_at, 'Y-m-d') }}</span>
            </p>
            <p class="text-right">レビュー件数:&nbsp;{{ $book->reviews->count() }}件</p>
          </a>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>

  <!-- footer -->
  <footer class="bg-[#404040] w-[80%] rounded-lg mx-auto text-white py-5">
    <p class="text-center">Copyright&copy; 2022 Privacy Policy</p>
  </footer>
</x-app-layout>
