<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-900 border border-gray-200 p-8 rounded-xl">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <form action="/login" method="post" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-300">
                        Email
                    </label>
                    <input type="email" class="rounded-sm border border-gray-300 p-2 w-full" required id="email"
                        name="email" value="{{ old('email') }}">

                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-300">
                        Password
                    </label>
                    <input type="password"
                        class="rounded-sm border border-gray-300 p-2 w-full {{ $errors->has('password') ? 'border-red-500' : '' }}"
                        required id="password" name="password">

                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>

                @if ($errors->any())
                    <ul class="list-outside marker:text-red-400">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-400 text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-4 w-4 inline-block mr-2 text-red-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
