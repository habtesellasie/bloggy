 @if (session()->has('success'))
     {{-- <p>{{ session()->get('success') }}</p> --}}
     <div x-data='{ show: true }' x-init="setTimeout(() => show = false, 5000)" x-show="show"
         class="fixed bottom-2 right-2 bg-green-400 text-green-900 py-4 px-12 rounded animate-slide-in-from-right">
         <p>{{ session('success') }}</p>

     </div>
 @endif
