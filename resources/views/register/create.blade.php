<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border border-gray-300 rounded-xl p-6">
            <h1 class="text-center text-xl font-bold">Register</h1>
            <form action="/register" method="post" class="mt-10">
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>

                    <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Username
                    </label>

                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                {{-- <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full"
                        required>
                </div> --}}
                
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>

                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-6">
                  <button type="submit" class="bg-blue-400 text-white py-2 px-4 hover:bg-blue-500">
                    Submit
                  </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
