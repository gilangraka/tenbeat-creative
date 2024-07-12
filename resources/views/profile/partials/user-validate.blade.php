<section>
    @if ($ref_user->nomor_hp == null || trim($ref_user->nomor_hp == ''))
        <div class="bg-yellow-200 p-2 mb-6 rounded-md">
            <span>
                Lengkapi data untuk dapat mengakses dashboard
            </span>
        </div>
    @endif

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Data User') }}
        </h2>
    </header>

    <form method="post" action="{{ route('klien.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nomor_hp" :value="__('Nomor HP')" />
            <x-text-input id="nomor_hp" name="nomor_hp" type="text" class="mt-1 block w-full" :value="old('nomor_hp', $ref_user->nomor_hp)"
                required />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
