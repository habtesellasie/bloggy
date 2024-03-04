<x-layout>

    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name='title' />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />
            <x-form.input name='slug' />
            <x-form.input name="thumbnail" type="file" />

            <x-form.field>
                <x-form.label name='category' />

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name='category' />
            </x-form.field>

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Publish</button>
            </div>

        </form>
    </x-setting>


</x-layout>
