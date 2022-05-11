<x-app-layout>
  <!-- flash message -->
  @if(session('flash'))
   <p id="flash" class="text-white text-center p-2 bg-green-400">{{ session('flash') }}</p>
  @endif

  <!-- main -->
  <div class="bg-my-light-blue w-[80%] mx-auto mt-10 py-5 px-10 rounded-lg border border-black">
    <h1 class="bg-my-gray px-2 inline-block p-1 text-gray-800">最近のレビュー</h1>
    <ul class="mt-5">
      @forelse ($books as $review)
          <li class="mb-2">
        <div class="flex justify-center w-[90%] mx-auto">
          <div class="w-[15%] bg-my-blue rounded-lg flex justify-center items-center">
            <span class="text-white font-bold text-2xl">95</span>
          </div>
          <div class="w-[85%] pl-2 rounded-lg border border-black bg-white hover:bg-my-light-blue">
            <p>book title</p>
            <p>review title</p>
            <p>user name and review score</p>
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
</x-app-layout>
