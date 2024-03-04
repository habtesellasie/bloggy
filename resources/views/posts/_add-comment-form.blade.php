@auth

    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="POST">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60"
                    class="rounded-xl ml-2">
                <h2 class="ml-4">Want to Participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" id="body" cols="30" rows="8"
                    class="w-full text-sm focus:outline-none focus:ring"></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="text-blue-500 underline-offset-4 underline hover:text-blue-400">Register</a> or
        <a href="/login" class="text-blue-500 underline-offset-4 underline hover:text-blue-400">Log
            in</a>
        to leave a
        comment
    </p>
@endauth
