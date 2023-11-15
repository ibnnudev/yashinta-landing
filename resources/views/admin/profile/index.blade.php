<x-app-layout>
    @section('title', 'Pengaturan Profil')
    <div class="max-w-full">
        <form action={{ route('admin.profile.update') }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <h1 class="font-semibold text-lg mb-5">Pengaturan Profil</h1>

            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                <div class="mb-4">
                    <h2 class="text-md">Beranda</h2>
                    <hr class="my-2">

                    <x-input label="Judul Hero" name="name" value="{{ $profile->name }}" />
                    <x-input label="Subjudul Hero" name="title_landing_page"
                        value="{{ $profile->title_landing_page }}" />
                    <x-input label="Deskripsi Profil" name="description_profile_page"
                        value="{{ $profile->description_profile_page }}" />
                    <div class="grid grid-cols-7 gap-4">
                        <img class="aspect-square w-full object-cover rounded-lg"
                            src="{{ $profile->photo_landing_page != null ? asset('storage/' . $profile->photo_landing_page) : 'https://via.placeholder.com/150' }}"
                            alt="">
                        <div class="col-span-6">
                            <x-input-file label="Foto Hero Beranda" name="photo_landing_page"
                                value="{{ $profile->photo_landing_page }}" />
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h2 class="text-md">Profil</h2>
                    <hr class="my-2">

                    <x-input label="Judul" name="title_profile_page" value="{{ $profile->title_profile_page }}" />
                    <x-input label="Deskripsi" name="description_profile_page"
                        value="{{ $profile->description_profile_page }}" />
                    <div class="grid grid-cols-7 gap-4 mb-2">
                        <img class="aspect-square w-full object-cover rounded-lg"
                            src="{{ $profile->photo_profile_page != null ? asset('storage/' . $profile->photo_profile_page) : 'https://via.placeholder.com/150' }}"
                            alt="">
                        <div class="col-span-6">
                            <x-input-file label="Header" name="photo_profile_page"
                                value="{{ $profile->photo_profile_page }}" />
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-4 mb-2">
                        <img class="aspect-square w-full object-cover rounded-lg"
                            src="{{ $profile->photo_educations != null ? asset('storage/' . $profile->photo_educations) : 'https://via.placeholder.com/150' }}"
                            alt="">
                        <div class="col-span-6">
                            <x-input-file label="Foto Bagian Pendidikan" name="photo_educations"
                                value="{{ $profile->photo_educations }}" />
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-4 mb-2">
                        <img class="aspect-square w-full object-cover rounded-lg"
                            src="{{ $profile->photo_experiences != null ? asset('storage/' . $profile->photo_experiences) : 'https://via.placeholder.com/150' }}"
                            alt="">
                        <div class="col-span-6">
                            <x-input-file label="Foto Bagian Pengalaman Kerja" name="photo_experiences"
                                value="{{ $profile->photo_experiences }}" />
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-4 mb-2">
                        <img class="aspect-square w-full object-cover rounded-lg"
                            src="{{ $profile->photo_organizations != null ? asset('storage/' . $profile->photo_organizations) : 'https://via.placeholder.com/150' }}"
                            alt="">
                        <div class="col-span-6">
                            <x-input-file label="Foto Bagian Organisasi" name="photo_organizations"
                                value="{{ $profile->photo_organizations }}" />
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-4 mb-2">
                        <img class="aspect-square w-full object-cover rounded-lg"
                            src="{{ $profile->photo_social_activities != null ? asset('storage/' . $profile->photo_social_activities) : 'https://via.placeholder.com/150' }}"
                            alt="">
                        <div class="col-span-6">
                            <x-input-file label="Foto Bagian Aktivitas Sosial" name="photo_social_activities"
                                value="{{ $profile->photo_social_activities }}" />
                        </div>
                    </div>
                </div>

            </div>

            <button type="submit"
                class="bg-primary-red text-white rounded-lg px-4 py-2 mt-4 hover:bg-secondary-red">Simpan</button>
        </form>
    </div>



</x-app-layout>