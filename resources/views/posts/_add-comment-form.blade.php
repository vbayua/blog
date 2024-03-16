@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post" class="w-full flex flex-col">
            @csrf

            <header class="flex items-center space-x-2">
                <img src="https://i.pravatar.cc/100?id={{ auth()->user()->id }}" alt="" class="rounded-xl"
                    width="45" height="45">

                <h3>Leave a comment</h3>
            </header>

            <div class="mt-6">
                <textarea name="body" id="comment" rows="5" class="w-full text-sm focus:outline-none focus:ring rounded p-2"
                    placeholder="Quick, think of something to say" required></textarea>

                @error('body')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2 flex justify-end border-t-2">
                <x-submit-button class="mt-4">
                    Submit
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="text-sm font-semibold">
        <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login"
            class="text-blue-500 hover:underline">Log in</a> to leave a comment.
    </p>
@endauth
