    <div
      class="flex flex-wrap justify-between items-center w-screen text-white bg-[#4763C2] md:flex-nowrap p-5"
    >
      <!-- Title -->
      <div class="flex items-center h-full pl-3 space-x-3">
        <a href="{{ url('/') }}"><p class="text-2xl">ブックレビュー投稿</p></a>
      </div>
      <!-- MenuButton -->
      <button
        class="flex items-center justify-end flex-grow pr-3 focus:outline-none md:hidden"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-8 h-8"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </button>

      <!-- Menu -->
      <div
        class="flex-col items-stretch text-lg text-center transform md:flex-row md:translate-y-0 md:space-x-5 md:items-center md:justify-end md:pr-3"
      >
      <div class="flex justify-end items-center gap-3">
        @guest
        <a
          href="{{ route('register') }}"
          class="leading-10 border-b-2 border-dotted md:border-none"
          >新規登録</a
        >
        <a
          href="{{ route('login') }}"
          class="leading-10 border-b-2 border-dotted md:border-none"
          >ログイン</a
        >
        @else
        <div>
          <i class="fa-solid fa-user" style="margin-bottom: 3px; margin-right: 3px;"></i>{{ Auth::user()->name }}
        </div>
        @if(Auth::user()->admin == 1)
        <a href="{{ route('books.create') }}">ブック登録</a>
        @endif
        <form action="{{ route('logout') }}" method="POST" id="logout_form">
          @csrf
        </form>
        <a href="#" class="leading-10 border-b-2 border-dotted md:border-none" onclick="logout();">ログアウト</a>
        @endguest
      </div>
      <div class="flex gap-3">
        <form action="{{ route('books.search') }}" method="GET" class="inline">
            <div class="flex items-center">
        <div class="w-full">
            <input type="search" name="q_word" class="w-full px-4 py-1 text-gray-800 focus:outline-none rounded-l-lg"
                placeholder="ブックを検索" x-model="search">
        </div>
        <div>
            <button type="submit" class="flex items-center bg-white justify-center w-8 h-8 text-gray-800 rounded-r-lg"
                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                :disabled="search.length == 0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>
  </form>
        <a
          href="#"
          class="bg-[#EFEFEF] px-2 text-gray-800 flex justify-center items-center"
          >レビューを投稿</a
        >
      </div>
      </div>
    </div>

<script>
 'use strict';

 function logout(){
   let form = document.getElementById('logout_form');

   form.submit();
 }
</script>
