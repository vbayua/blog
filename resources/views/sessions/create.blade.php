<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <h1 class="text-center text-xl font-bold">Sign In</h1>
            <form action="/login" method="POST" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" autocomplete="email" />
                <x-form.input name="password" type="password" autocomplete="new-password" />

                <div class="mt-6">
                    <x-submit-button class="py-2 px-4">Sign In</x-submit-button>
                </div>
            </form>
        </x-panel>
        </main>
    </section>
</x-layout>
