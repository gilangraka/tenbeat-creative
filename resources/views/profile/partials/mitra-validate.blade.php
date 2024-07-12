<section>
    @if ($mitra->is_active != 1)
        <div class="bg-yellow-200 p-2 mb-6 rounded-md">
            <span>Status kamu saat ini masih belum di verifikasi. Lengkapi profil untuk dapat
                menggunakan
                dashboard</span>
        </div>
    @endif

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Data Mitra') }}
        </h2>
    </header>

    <form method="post" action="{{ route('mitra.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nomor_hp" :value="__('Nomor HP')" />
            <x-text-input id="nomor_hp" name="nomor_hp" type="text" class="mt-1 block w-full" :value="old('nomor_hp', $mitra->nomor_hp)"
                required />
        </div>

        <div>
            <x-input-label for="nomor_rekening" :value="__('Nomor Rekening')" />
            <x-text-input id="nomor_rekening" name="nomor_rekening" type="text" class="mt-1 block w-full"
                :value="old('nomor_rekening', $mitra->nomor_rekening)" required />
        </div>

        <div>
            <x-input-label for="id_rekening" :value="__('Nama Rekening')" />
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                name="id_rekening" id="id_rekening" required>
                <option value="" disabled selected>-- Pilih Rekening --</option>
                @foreach ($rekening as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $mitra->id_rekening) selected @endif>
                        {{ $item->nama_rekening }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label for="email" :value="__('Resume / CV')" />
            <div class="flex gap-2 w-full">
                <input type="file" class="file-input file-input-bordered w-full" accept=".pdf" name="resume" />
                @if ($mitra->resume != null)
                    <a href="{{ url('resume-download') }}/{{ $mitra->resume }}" class="btn btn-primary"><i
                            data-feather="eye"></i></a href="{{ url('resume-download/') }}{{ $mitra->resume }}">
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
