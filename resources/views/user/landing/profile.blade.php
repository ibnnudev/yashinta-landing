<x-guest-layout>
    @section('title', 'Profil')

    <div class="bg-gray-50 min-h-screen">
        <!-- Navbar -->
        <nav class="z-20">
            <div
                class="max-w-2xl lg:max-w-4xl flex flex-wrap justify-between md:grid md:grid-cols-12 md:gap-5 items-center mx-auto p-4 md:py-6">
                <a href="/"
                    class="p-2 md:p-0 flex items-center w-fit space-x-3 rtl:space-x-reverse justify-start md:col-span-3 lg:col-span-5">
                    <img src="{{ asset('asset/logo-red.png') }}" class="h-8 md:h-10" alt="Flowbite Logo" />
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
                <div class="hidden w-full md:col-span-9 lg:col-span-7 md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium sm:grid md:flex justify-start items-center md:justify-end p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0
                        ">
                        <li>
                            <a href="/"
                                class="block py-2 px-3 rounded text-primary md:p-0 hover:underline"
                                aria-current="page">Teras</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.profile') }}"
                                class="block py-2 px-3 text-white bg-primary md:text-primary md:bg-transparent rounded hover:bg-transparent md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.news') }}"
                                class="block py-2 px-3 text-primary rounded hover:bg-transparent md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Pantau</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.commitment') }}"
                                class="block py-2 px-3 text-primary rounded hover:bg-transparent md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Komitmen</a>
                        </li>
                        <li>
                            <a href="{{ route('user.landing.faq') }}"
                                class="block py-2 px-3 text-primary rounded hover:bg-transparent md:hover:bg-transparent md:border-0 md:hover:underline text-md md:p-0">Cek
                                Fakta</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Profile -->
        <section class="relative flex items-center w-full h-fit">
            <div class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl">
                <img src="{{ asset('storage/profile/' . $data->photo_profile_page) }}"
                    class="w-full h-auto rounded-2xl mb-8" alt="">
                <h1 class="text-xl md:text-3xl font-bold text-black mb-4 leading-snug">
                    {{ $data->title_profile_page }}
                </h1>
                <p class="md:text-lg">
                    {{ $data->description_profile_page }}
                </p>
            </div>
        </section>

        @foreach ($profileSections as $data)
            <!-- Section 1 -->
            <section class="relative flex items-center w-full h-fit">
                <div
                    class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl {{ $data->title ? 'py-6' : 'py-3' }}">
                    @if ($data->title)
                        <h2 class="text-xl md:text-3xl font-bold text-red-900 mb-4 leading-snug">
                            {{ $data->title }}
                        </h2>
                    @endif
                    @if ($data->quotes || $data->image)
                        <div class="grid grid-cols-1 gap-6">
                            @if ($data->quotes)
                                <p class="md:text-lg italic">
                                    “{{ $data->quotes }}”
                                </p>
                            @endif
                            @if ($data->image)
                                <img src="{{ asset('storage/profile/' . $data->image) }}"
                                    class="w-full aspect-[672/278] rounded-2xl object-center object-cover"
                                    alt="">
                            @endif
                        </div>
                    @endif
                    <div class="grid grid-cols-1">
                        @if ($data->content)
                            <div class="text-md md:text-lg mt-6">
                                {!! $data->content !!}
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endforeach

        <!-- Education -->
        <section class="relative flex items-center w-full h-fit">
            <div
                class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl py-6 md:py-12 border-b border-t border-red-900">
                <h2 class="text-xl md:text-3xl font-bold text-red-900 mb-4 leading-snug">
                    Pendidikan
                </h2>
                <div class="grid grid-cols-1 gap-8">
                    <div class="space-y-4">
                        @foreach ($educations as $education)
                            <div>
                                <h1 class="font-bold text-lg md:text-xl">
                                    {{ $education->university_name }}
                                </h1>
                                <p class="text-md md:text-lg">
                                    {{ $education->study }}
                                </p>
                                <p class="text-md md:text-lg">
                                    @if ($education->start_date && $education->end_date)
                                        @if (date('Y', strtotime($education->start_date)) == date('Y', strtotime($education->end_date)))
                                            {{ date('Y', strtotime($education->start_date)) }}
                                        @else
                                            {{ date('Y', strtotime($education->start_date)) }} -
                                            {{ date('Y', strtotime($education->end_date)) }}
                                        @endif
                                    @elseif ($education->start_date && !$education->end_date)
                                        {{ date('Y', strtotime($education->start_date)) }} -
                                        sekarang
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <img src="{{ asset('storage/educations/' . $profile->photo_educations) }}"
                            class="w-full h-[18em] rounded-2xl object-center object-cover" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Working Experience -->
        <section class="relative flex items-center w-full h-fit">
            <div
                class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl py-6 md:py-12 border-b border-red-900">
                <h2 class="text-xl md:text-3xl font-bold text-red-900 mb-4 leading-snug">
                    Pengalaman Kerja
                </h2>
                <div class="grid grid-cols-1 gap-8">
                    <div class="space-y-4">
                        @foreach ($experiences as $data)
                            <div>
                                <h1 class="font-bold text-lg md:text-xl">{{ $data->company_name }}</h1>
                                <p class="text-md md:text-lg">{!! str_replace(',', ',<br>', $data->position) !!}</p>
                                <p class="text-md md:text-lg">
                                    @if ($data->start_date && $data->end_date)
                                        @if (date('Y', strtotime($data->start_date)) == date('Y', strtotime($data->end_date)))
                                            {{ date('Y', strtotime($data->start_date)) }}
                                        @else
                                            {{ date('Y', strtotime($data->start_date)) }} -
                                            {{ date('Y', strtotime($data->end_date)) }}
                                        @endif
                                    @elseif ($data->start_date && !$data->end_date)
                                        {{ date('Y', strtotime($data->start_date)) }} -
                                        sekarang
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <img src="{{ asset('storage/experiences/' . $profile->photo_experiences) }}"
                            class="w-full h-[18em] rounded-2xl object-center object-cover" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Organization -->
        <section class="relative flex items-center w-full h-fit">
            <div
                class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl py-6 md:py-12 border-red-900">
                <h2 class="text-xl md:text-3xl font-bold text-red-900 mb-4 leading-snug">
                    Organisasi
                </h2>
                <div class="grid grid-cols-1 gap-8">
                    <div class="space-y-4">
                        @foreach ($organizations as $data)
                            <div>
                                <h1 class="font-bold text-lg md:text-xl">{{ $data->name }}</h1>
                                <p class="text-md md:text-lg">{{ $data->position }}</p>
                                <p class="text-md md:text-lg">
                                    @if ($data->start_date && $data->end_date)
                                        @if (date('Y', strtotime($data->start_date)) == date('Y', strtotime($data->end_date)))
                                            {{ date('Y', strtotime($data->start_date)) }}
                                        @else
                                            {{ date('Y', strtotime($data->start_date)) }} -
                                            {{ date('Y', strtotime($data->end_date)) }}
                                        @endif
                                    @elseif ($data->start_date && !$data->end_date)
                                        {{ date('Y', strtotime($data->start_date)) }} -
                                        sekarang
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <img src="{{ asset('storage/organizations/' . $profile->photo_organizations) }}"
                            class="w-full h-[18em] rounded-2xl object-center object-cover" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Social Activity -->
        {{-- <section class="relative flex items-center w-full h-fit mb-24">
            <div class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl py-6 md:py-12">
                <h2 class="text-xl md:text-3xl font-bold text-red-900 mb-4 leading-snug">
                    Kegiatan Sosial
                </h2>
                <div class="grid grid-cols-1 gap-8">
                    <div class="space-y-4">
                        @foreach ($socials as $data)
                            <div> --}}
        {{-- <h1 class="font-bold text-lg md:text-xl">{{ $data->name }}</h1> --}}
        {{-- <p class="text-md md:text-lg">{!! $data->description !!}</p> --}}
        {{-- <p class="text-md md:text-lg">
                                    {{ date('d F Y', strtotime($data->date)) }}
                                </p> --}}
        {{-- </div>
                        @endforeach
                    </div>
                    <div>
                        <img src="{{ asset('storage/social_activities/' . $profile->photo_social_activities) }}"
                            class="w-full h-[18em] rounded-2xl object-center object-cover" alt="">
                    </div>
                </div>
            </div>
        </section> --}}


    </div>
</x-guest-layout>
