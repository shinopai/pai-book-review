<x-app-layout>
<section class="flex justify-center items-center w-[80%] mx-auto mt-10">
    <div class="w-[80%] mx-auto bg-my-light-blue rounded pb-10 space-y-4 border border-gray-100">
      <form method="POST" action="{{ route('users.profile.update', ['user' => $user->id]) }}" novalidate enctype="multipart/form-data">
            @csrf
            @method('patch')
        <div class="mb-4">
          <h2 class="text-xl font-bold text-white bg-my-blue p-2">プロフィール編集</h2>
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="w-[80%] mx-auto mt-10">
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" name="name" placeholder="ユーザー名" value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-2">
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="email" name="email" placeholder="メールアドレス" value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-4">
            <label for="image">プロフィール画像</label>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" id="image" type="file" name="image">
        </div>
        <div>
            <button class="w-full py-4 bg-my-gray rounded text-sm font-bold transition duration-200">プロフィール更新</button>
        </div>
        </form>
    </div>
    </div>
</section>
</x-app-layout>
