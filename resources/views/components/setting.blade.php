@props(['heading'])

<section class="py-8 max-w-4xl m-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">

        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a></li>
            </ul>
        </aside>

        <main class="flex-1">

            <x-panel class="bg-gray-200">

                {{ $slot }}

            </x-panel>

        </main>
    </div>
</section>
