@props(['post'])
<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">
                                {{ $post->author->name }}
                            </a>
                        </h5>
                        <h6>{{ $post->author->username }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $post->body !!}
                </div>

                <section class="mt-10 space-y-6">
                    <x-panel>
                        <form action="/posts/{{ $post->slug}}/comments" method="post" class="w-full flex flex-col">
                            @csrf

                            <header class="flex items-center space-x-2">
                                <img src="https://i.pravatar.cc/100?id={{ auth()->id() }}" alt=""
                                    class="rounded-xl" width="45" height="45">

                                <h3>Leave a comment</h3>
                            </header>

                            <div class="mt-6">
                                <textarea name="body" id="comment" rows="5" class="w-full text-sm focus:outline-none focus:ring rounded p-2"
                                    placeholder="Quick, think of something to say"></textarea>
                            </div>

                            <div class="mt-2 flex justify-end border-t-2">
                                <button type="submit"
                                    class="mt-4 rounded-xl py-2 px-4 bg-blue-500 hover:bg-blue-400 text-white">Submit</button>
                            </div>
                        </form>
                    </x-panel>
                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach
                </section>
            </div>
        </article>
    </main>
</x-layout>
