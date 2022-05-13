<x-app-layout>
  <!-- flash message -->
  @if(session('flash'))
   <p id="flash" class="text-white text-center p-2 bg-green-400">{{ session('flash') }}</p>
  @endif

  <!-- popup -->
  @foreach($reviews as $review)
  <div class="w-full h-screen absolute top-0 left-0 hidden overlay_wrapper" id="overlay{{ $review->id }}">
    <div class="bg-black bg-opacity-50 cursor-pointer w-full h-full absolute left-0 top-0 overlay"></div>
    <div class="bg-my-light-blue w-[70%] mx-auto absolute left-0 right-0 top-[50%] translate-y-[-50%] p-5 rounded-lg border border-black popup">
      <i class="fa-solid fa-xmark text-2xl w-[32px] h-[32px] block ml-auto text-center cursor-pointer" id="close_btn"></i>
      <div class="flex justify-start">
        <div class="w-[10%]">
          <div class="bg-my-blue rounded-lg flex justify-center items-center border py-5 text-white">
              <span class="font-bold text-2xl block">{{ $review->score }}</span>
          </div>
        </div>
        <div class="flex-grow pl-2">
          <h1 class="bg-my-gray text-lg px-2 p-1 w-fit mb-2 text-blue-600"><a href="{{ route('books.show', ['book' => $review->book->id]) }}">{{ $review->book->title }}</a></h1>
          <h2 class="bg-my-gray px-2 w-fit mb-2 p-1 text-gray-800">{{ $review->book->publisher->name }}</h2>
          <div>
          <h2 class="bg-my-gray px-2 inline-block p-1 text-gray-800">{{ $review->book->genre->name }}</h2>
          <h2 class="bg-my-gray px-2 inline-block p-1 text-gray-800">{{ date_format($review->book->published_at, 'Y年m月d日') }}</h2>
          </div>
        </div>
      </div>
      <h2 class="bg-my-gray px-2 w-fit mb-2 mt-5 p-1 text-gray-800">{{ $review->title }}</h2>
      <textarea class="w-full p-2 mt-2 resize-none" rows="6" readonly="readonly">{{ $review->content }}</textarea>
            <p>
              <span class="mr-2 text-blue-600">
                @if(My_func::isExistsImage($review->user->user_image))
                <img src="{{ asset('storage/images/'.$review->user->user_image) }}" alt="{{ $review->user->name }}" srcset="" class="inline-block rounded-full" width="40" height="40">
                @else
                <img src="{{ asset('images/user_profile.jpg') }}" alt="{{ $review->user->name }}" srcset="" class="inline-block rounded-full" width="40" height="40">
                @endif
                <a href="{{ route('users.profile', ['user' => $review->user->id]) }}">{{ $review->user->name }}</a>
              </span>
              <span>このレビューの評価&nbsp;<i class="fa-solid fa-star"></i>2.5</span>
            </p>
            @auth
            @if(Auth::id() == $review->user->id)
      <button class="w-fit mt-2 p-2 bg-green-400 text-white rounded text-sm transition duration-200"><a href="{{ route('books.users.reviews.edit', ['book' => $review->book->id, 'user' => $review->user->id, 'review' => $review->id]) }}">編集</a></button>
      <form action="{{ route('books.users.reviews.destroy', ['book' => $review->book->id, 'user' => $review->user->id, 'review' => $review->id]) }}" method="post" id="destroy_review_form" class="inline">
        @csrf
        @method('delete')
      </form>
      <button class="w-fit mt-2 p-2 bg-red-400 text-white rounded text-sm transition duration-200" onclick="destroyReview()">削除</button>
      @endif
      @endauth
      <button class="w-fit mt-2 p-2 bg-my-gray rounded text-sm transition duration-200 ml-auto block" id="close_btn2">閉じる</button>
  </div>
  </div>
@endforeach

  <!-- main -->
  <div class="bg-my-light-blue w-[80%] mx-auto mt-10 py-5 px-10 rounded-lg border border-black">
    <h1 class="bg-my-gray px-2 inline-block p-1 text-gray-800">最近のレビュー</h1>
    <ul class="mt-5">
      @forelse ($reviews as $review)
          <li class="mb-2">
        <div class="flex justify-center w-[90%] mx-auto">
          <div class="w-[15%] bg-my-blue rounded-lg flex justify-center items-center">
            <span class="text-white font-bold text-2xl">{{ $review->score }}</span>
          </div>
          <div class="w-[85%] p-2 rounded-lg border border-black bg-white hover:bg-my-light-blue cursor-pointer popup_trigger" data-id="{{ $review->id }}">
            <p class="text-lg">{{ $review->book->title }}</p>
            <p>{{ $review->title }}</p>
            <p class="text-right">
              <span class="mr-2">
                @if(My_func::isExistsImage($review->user->user_image))
                <img src="{{ asset('storage/images/'.$review->user->user_image) }}" alt="{{ $review->user->name }}" srcset="" class="inline-block rounded-full" width="40" height="40">
                @else
                <img src="{{ asset('images/user_profile.jpg') }}" alt="{{ $review->user->name }}" srcset="" class="inline-block rounded-full" width="40" height="40">
                @endif
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
  <footer class="bg-[#404040] w-[80%] rounded-lg mx-auto text-white py-5">
    <p class="text-center">Copyright&copy; 2022 Privacy Policy</p>
  </footer>

  <script>
    'use strict';

    function destroyReview(){
      if(confirm('本当に宜しいですか？')){
        document.getElementById('destroy_review_form').submit();
      }
    }
  </script>
</x-app-layout>
