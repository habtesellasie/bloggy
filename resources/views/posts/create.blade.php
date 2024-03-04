<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-md m-auto">

            <form action="/admin/posts" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>

                    <input type="text" class="border border-gray-400 p-2 w-full" name="title" id="title" required
                        value="{{ old('title') }}">

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>

                    <textarea type="text" class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>

                    <textarea type="text" class="border border-gray-400 p-2 w-full" name="body" id="body" required>{{ old('body') }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>

                    <input type="text" class="border border-gray-400 p-2 w-full" name="slug" id="slug"
                        required value="{{ old('slug') }}">

                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>

                    <select name="category_id" id="category_id">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>


                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Publish</button>
                </div>

            </form>
        </x-panel>
    </section>
</x-layout>