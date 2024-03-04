<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name='title' :value="old('title', $post->title)" />
            <x-form.textarea name="excerpt">
                {{ old('excerpt', $post->excerpt) }}
            </x-form.textarea>
            <x-form.textarea name="body" :value="$post->body">
                {{ old('body', $post->body) }}
            </x-form.textarea>
            <x-form.input name='slug' :value="old('slug', $post->slug)" />

            <div class="flex mt-6 items-end">

                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="rounded-xl mr-6" alt=""
                    width="100">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" />
                </div>
            </div>
            <x-form.field>
                <x-form.label name='category' />

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name='category' />
            </x-form.field>

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Update
                </button>
            </div>

        </form>
    </x-setting>


</x-layout>
