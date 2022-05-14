<x-app-layout>
  <!-- flash message -->
  @if(session('flash'))
  <p id="flash" class="text-white text-center p-2 bg-green-400">
    {{ session("flash") }}
  </p>
  @endif

  <!-- main -->
  <div
    class="bg-my-light-blue w-[80%] mx-auto p-5 rounded-lg border border-black mt-10"
  >
    <div class="flex justify-start">
      @if(env('APP_ENV') === 'local')
      <div class="w-[20%]">
        @if(My_func::isExistsImage($user->user_image))
        <img
          src="{{ asset('storage/images/'.$user->user_image) }}"
          alt="{{ $user->name }}"
          srcset=""
          class="w-full h-auto object-cover"
        />
        @else
        <img
          src="{{ asset('images/user_profile.jpg') }}"
          alt="{{ $user->name }}"
          srcset=""
          class="w-full h-auto object-cover"
        />
        @endif @else
        <img
          src="{{ $user->user_image }}"
          alt="{{ $user->name }}"
          srcset=""
          class="w-full h-auto object-cover"
        />
      </div>
      @endif
      <div class="flex-grow pl-5">
        <h1 class="bg-my-gray text-lg px-2 p-1 w-fit mb-2">
          {{ $user->name }}
        </h1>
        <h2 class="bg-my-gray px-2 w-fit mb-2 p-1 text-gray-800">
          レビュー件数:&nbsp;{{ $user->reviews->count() }}
        </h2>
        <div>
          <h2 class="bg-my-gray px-2 inline-block p-1 text-gray-800">
            総合評価:
          </h2>
        </div>
      </div>
    </div>
    @auth @if(Auth::id() == $user->id)
    <a
      href="{{ route('users.profile.edit', ['user' => $user->id]) }}"
      class="w-fit mt-5 p-2 bg-green-400 text-white rounded text-sm transition duration-200 block"
      >プロフィール編集</a
    >
    @endif @endauth
  </div>

  <div
    class="bg-my-light-blue w-[80%] mx-auto mt-10 py-5 px-10 rounded-lg border border-black"
  >
    <h1 class="bg-my-gray px-2 inline-block p-1 text-gray-800">
      最近のレビュー
    </h1>
    <ul class="mt-5">
      @forelse ($user->reviews as $review)
      <li class="mb-2">
        <div class="flex justify-center w-[90%] mx-auto">
          <div
            class="w-[15%] bg-my-blue rounded-lg flex justify-center items-center"
          >
            <span
              class="text-white font-bold text-2xl"
              >{{ $review->score }}</span
            >
          </div>
          <div
            class="w-[85%] p-2 rounded-lg border border-black bg-white hover:bg-my-light-blue cursor-pointer popup_trigger"
            data-id="{{ $review->id }}"
          >
            <a href="{{ route('books.show', ['book' => $review->book->id]) }}">
              <p class="text-lg">{{ $review->book->title }}</p>
              <p>{{ $review->title }}</p>
              <p class="text-right">
                <span class="mr-2">
                  @if(My_func::isExistsImage($review->user->user_image))
                  <img
                    src="{{ asset('storage/images/'.$review->user->user_image) }}"
                    alt="{{ $review->user->name }}"
                    srcset=""
                    class="inline-block rounded-full"
                    width="40"
                    height="40"
                  />
                  @else
                  <img
                    src="{{ asset('images/user_profile.jpg') }}"
                    alt="{{ $review->user->name }}"
                    srcset=""
                    class="inline-block rounded-full"
                    width="40"
                    height="40"
                  />
                  @endif
                  {{ $review->user->name }}
                </span>
                <span
                  >このレビューの評価&nbsp;<i class="fa-solid fa-star"></i
                  >2.5</span
                >
              </p>
            </a>
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
    "use strict";

    function destroyReview() {
      if (confirm("本当に宜しいですか？")) {
        document.getElementById("destroy_review_form").submit();
      }
    }
  </script>
</x-app-layout>
