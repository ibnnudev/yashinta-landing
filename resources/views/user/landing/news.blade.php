<x-guest-layout>
    @section('title', 'Berita')

    <div class="bg-gray-50 min-h-screen">
        <!-- Navbar -->
        <nav>
            <div class="max-w-2xl flex flex-wrap items-center justify-between mx-auto p-4 py-6">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('asset/logo-red.png') }}" class="h-10" alt="Flowbite Logo" />
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden  focus:outline-none focus:ring-2 text-primary"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0
                    ">
                        <li>
                            <a href="/"
                                class="block py-2 px-3 text-primary rounded md:bg-transparent md:text-red-900 md:p-0 hover:underline"
                                aria-current="page">Teras</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.profile') }}"
                                class="block py-2 px-3 text-red-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Profil</a>
                        </li>
                        <li>

                            <a href="{{ route('user.landing.commitment') }}"
                                class="block py-2 px-3 text-red-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Komitmen</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.news') }}"
                                class="block py-2 px-3 md:text-primary md:bg-transparent text-white bg-primary rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Berita</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.testimonial') }}"
                                class="block py-2 px-3 text-red-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Testimoni</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.faq') }}"
                                class="block py-2 px-3 text-red-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- News -->
        <section class="relative flex items-center w-full h-fit">
            <div class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl py-6 md:py-16">
                <h2 class="text-2xl md:text-3xl font-extra-bold text-black mb-8">
                    Berita Terbaru Yashinta
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    @foreach ($news as $data)
                        <div class="px-4 py-6 bg-white rounded-2xl shadow-md">
                            <p class="text-gray-400 font-medium text-sm mb-4">
                                {{ date('d F Y', strtotime($data->created_at)) }}
                            </p>
                            <h1 class="text-lg font-bold leading-snug mb-4">
                                {{ $data->title }}
                            </h1>
                            <img src="{{ asset('storage/news/' . $data->thumbnail) }}"
                                class="w-full h-36 object-cover object-center rounded-md mb-4" alt="">
                            <div class="line-clamp-3 text-md">
                                {{ str_replace('&nbsp;', ' ', html_entity_decode(strip_tags($data->content))) }}
                            </div>
                            <a href="{{ route('user.landing.news.detail', $data->slug) }}"
                                class="flex mt-8 items-center justify-end gap-x-2 font-semibold text-primary text-md">
                                <p class="">Baca selengkapnya</p>
                                <svg class="h-4 sm:h-4 md:h-4" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                                        <path d="M41.9999 24H5.99992" stroke="#cb0e26" stroke-width="4"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M30 12L42 24L30 36" stroke="#cb0e26" stroke-width="4"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


    </div>
</x-guest-layout>
