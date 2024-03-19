<!doctype html>

<title>Laravel From Scratch Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }

    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                @auth
                    <div class="flex items-center">
                        @auth
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }} </button>

                                </x-slot>
                                @admin
                                <x-dropdown-item href="/admin/dashboard" :active="request()->is('/admin/dashboard')" >Dashboard</x-dropdown-item>
                                <x-dropdown-item href="/admin/posts/create" :active="request()->is('/admin/posts/create')">New Post</x-dropdown-item>
                                @endadmin
                                <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                            </x-dropdown>
                            <form action="/logout" id="logout-form" method="post" class="hidden">
                                @csrf
                            </form>
                        @endauth
                    </div>
                @else
                    <a href="/login" class="text-xs font-bold uppercase text-blue-500 underline">Login</a>
                    <span class="text-xs pl-2">Or</span>
                    <a href="/register"
                        class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Sign Up
                    </a>
                    <a href="#newsletter"
                        class="bg-gray-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Subscribe
                    </a>

                @endauth
            </div>
        </nav>

        {{ $slot }}

        <x-flash />
        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" name="email" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                            @error('email')
                                <span class="text-xs text-red-500">
                                    Email Address is required
                                </span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>
