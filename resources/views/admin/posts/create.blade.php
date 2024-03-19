<x-layout>
    <x-settings heading="Publish New Post">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.field>
                <x-form.input name="title" />
            </x-form.field>

            <x-form.field>
                <x-form.input name="slug" />
            </x-form.field>

            <x-form.field>
                <x-form.input name="thumbnail" type="file" />
            </x-form.field>

            <x-form.field>
                <x-form.textarea name="excerpt" />
            </x-form.field>

            <x-form.field>
                <x-form.textarea name="body" />
            </x-form.field>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <x-submit-button class="mt-6">Publish</x-submit-button>
        </form>
    </x-settings>
</x-layout>
