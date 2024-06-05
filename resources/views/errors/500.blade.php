<x-layouts.error>
    <!-- <x-slot name="title">
        {{ trans('errors.title.500') }}
    </x-slot> -->

    <x-slot name="content">
        <div class="h-full flex flex-col sm:flex-row items-center justify-center sm:justify-between xl:-ml-64">
            <div class="flex flex-col items-start gap-y-4 mb-10 sm:mb-0 sm:-mt-24">
                <h1 style="font-weight:700; font-size:28px">WELCOME TO CONTAX ACCOUNTING </h1>
                <ul class="contax-list" style="list-style: disc; line-height:2.5rem; margin-left:1rem">
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                </ul>
                <!-- <h1 class="font-medium text-5xl lg:text-8xl">
                    {{ trans('errors.header.500') }}
                </h1> -->

                <!-- <span class="text-lg">
                    {{ trans('errors.title.500') }}
                </span> -->

                @if (! empty($message))
                <span class="text-lg">
                    {{ $message }}
                </span>
                @endif

                @php $landing_page = user() ? user()->getLandingPageOfUser() : route('login'); @endphp
                 <x-link
                    href="{{ $landing_page }}"
                    class="relative flex items-center justify-center bg-green hover:bg-green-700 text-white px-6 py-1.5 text-base rounded-lg disabled:bg-green-100 mt-3"
                    override="class" style="background-color:#247bff"
                >
                    {{ trans('general.go_to_dashboard') }}
                </x-link> 
            </div>

            <img src="{{ asset('public/img/man.png') }}" alt="man" />
        </div>

        <!-- resources/views/footer.blade.php -->
<!-- <footer class="footer bg-blue-600 text-white p-6">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="logo-section mb-4 md:mb-0 flex items-center">
            <img src="/path/to/logo.png" alt="Contax Logo" class="h-10 mr-2">
            <span class="text-lg font-bold">CONTAX</span>
        </div>
        <div class="content-section mb-4 md:mb-0">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
        </div>
        <div class="links-section mb-4 md:mb-0 flex flex-col md:flex-row">
            <div class="mr-6">
                <h5 class="font-bold">Content:</h5>
                <ul>
                    <li><a href="/dashboard" class="hover:underline">Dashboard</a></li>
                    <li><a href="/items" class="hover:underline">Items</a></li>
                    <li><a href="/sales" class="hover:underline">Sales</a></li>
                    <li><a href="/purchases" class="hover:underline">Purchases</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold">About:</h5>
                <ul>
                    <li><a href="/home" class="hover:underline">Home</a></li>
                    <li><a href="/categories" class="hover:underline">Categories</a></li>
                    <li><a href="/contact" class="hover:underline">Contact Us</a></li>
                    <li><a href="/about" class="hover:underline">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="social-section">
            <h5 class="font-bold mb-2">Follow Us On:</h5>
            <div class="flex space-x-4">
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-xing"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer> -->

    </x-slot>
</x-layouts.error>
