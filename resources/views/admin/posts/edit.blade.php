<x-layout>
    <x-settings :heading="'Edit Post ' . $post->title">
        <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.field>
                <x-form.input name="title" :value="old('title', $post->title)" required />
            </x-form.field>

            <x-form.field>
                <x-form.input name="slug" :value="old('slug', $post->slug)" required />
            </x-form.field>

            <div class="mt-6">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
            </div>

            <x-form.field>
                <x-form.textarea name="excerpt" required>{{ $post->excerpt }}</x-form.textarea>
            </x-form.field>

            <x-form.field>
                <x-form.textarea name="body" required> {{ $post->body }} </x-form.textarea>
            </x-form.field>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) === $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <x-submit-button class="mt-6">Publish</x-submit-button>
        </form>
    </x-settings>
</x-layout>
