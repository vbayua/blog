<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-300 rounded-xl p-6">
            <h1 class="text-center text-xl font-bold">Sign In</h1>
            <form action="/register" method="POST" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="border border-gray-400 p-2 w-full" required>

                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>

                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full"
                        required>

                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white py-2 px-4 hover:bg-blue-500">
                        Sign In
                    </button>
                </div>

                @if ($errors->any())
                    @foreach ($errors as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                @endif
            </form>
        </main>
    </section>
</x-layout>
