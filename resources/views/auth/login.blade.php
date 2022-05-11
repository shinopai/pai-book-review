<x-app-layout>
<section class="flex justify-center items-center w-[80%] mx-auto mt-10">
    <div class="w-[80%] mx-auto bg-my-light-blue rounded pb-10 space-y-4 border border-gray-100">
        <form method="POST" action="{{ route('login') }}" novalidate">
            @csrf
        <div class="mb-4">
            <h2 class="text-xl font-bold text-white bg-my-blue p-2">ログイン</h2>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="w-[80%] mx-auto mt-10">
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
        </div>
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="password" name="password" placeholder="パスワード">
        </div>
        <div>
            <button class="w-full py-4 bg-my-gray rounded text-sm font-bold transition duration-200">ログイン</button>
        </div>
               </form>
        <div class="flex items-center justify-between mt-10">
            <div class="flex flex-row items-center">
                <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="comments" class="ml-2 text-sm font-normal text-gray-600">ログイン状態を保存する</label>
            </div>
            <div>
                <a class="text-sm text-blue-600 hover:underline" href="#">パスワードを忘れた方</a>
            </div>
        </div>
    </div>
    </div>
</section>
</x-app-layout>
