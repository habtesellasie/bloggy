<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel From Scratch Blog</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="text-2xl text-blue-500 font-bold tracking-wider">
                    Bloggy
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                @auth
                    <x-dropdown>

                        <x-slot name="trigger">
                            <button
                                class="text-xs font-bold inline-flex items-center gap-1 underline underline-offset-8">Welcome,
                                {{ auth()->user()->name }}!
                                <svg class="transform -rotate-90" width="22" height="22" viewBox="0 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path fill="#222"
                                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>
                            </button>
                        </x-slot>

                        {{-- @can('admin') --}}
                        @admin
                            <x-dropdown-item href='/admin/posts' :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>

                            <x-dropdown-item href='/admin/posts/create' :active="request()->is('admin/posts/create')">Post</x-dropdown-item>
                        @endadmin
                        {{-- @endcan --}}
                        <x-dropdown-item href="#" x-data={}
                            @click.prevent="document.querySelector('#logout-form').submit()">Log out</x-dropdown-item>
                        <form action="/logout" method="POST" id="logout-form" class="hidden">
                            @csrf
                        </form>

                    </x-dropdown>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login"
                        class="text-xs font-semibold text-blue-900 bg-blue-300 ml-5 p-2 rounded hover:bg-blue-400 hover:text-blue-950 cursor-pointer">
                        Login
                    </a>
                @endauth

                {{-- ? the below are similar to doing the above @auth() --}}

                {{-- @unless (auth()->check())

                @endunless --}}

                {{-- @guest
                    
                @endguest --}}

                {{-- @if (auth()->check())
                    
                    @endif --}}
                <a href="#newsletter"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
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

                            <div>

                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                @error('email')
                                    <span class="text-xs text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
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
    <x-flash />
</body>

</html>
