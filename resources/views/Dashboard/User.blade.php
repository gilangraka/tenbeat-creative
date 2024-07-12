@push('js')
    <script>
        $(document).ready(function() {

            var table = $('#transaksi').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <div class="flex flex-col justify-center gap-4 p-4 bg-white w-1/4 shadow-sm sm:rounded-lg">
                <h5><b>Sisa Kuota Editing Video</b></h5>
                <h2 class="text-5xl text-gray-400"><b>{{ $data_user->count_video }} Video</b></h2>
                <h5 class="text-gray-400">Sampai {{ $data_user->subscribe }}</h5>

                @if ($data_user->count_video > 0 && $data_user->subscribe > now())
                    <button class="btn btn-success text-white w-full" onclick="addVideo.showModal()"><i
                            data-feather="plus"></i>Tambah
                        Editing
                        Video</button>
                @else
                    <form action="{{ route('topup.store') }}" method="POST">
                        @csrf
                        <button id="pay-button" class="btn btn-primary w-full"><i data-feather="dollar-sign"></i>Top
                            Up</button>
                    </form>
                @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    <h5 class="mb-3"><b>Riwayat Editing Video</b></h5>
                    <table id="transaksi" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keterangan Edit</th>
                                <th>Unggahan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trx as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->keterangan }}</td>
                                    <td>
                                        <a href="{{ url('/unggahan-download') }}/{{ $value->file_unggahan }}"
                                            class="btn btn-primary">
                                            <i data-feather="eye" class="text-white"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="flex gap-2 items-center justify-center">
                                            <div
                                                class="w-4 h-4 bg-{{ $value->css }}-100 rounded-full flex items-center justify-center">
                                                <div class="w-2 h-2 bg-{{ $value->css }}-500 rounded-full"></div>
                                            </div>
                                            <span>{{ $value->nama_status }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($value->status_id == 2)
                                            @php
                                                $mitra = DB::table('ref_mitra')
                                                    ->where('id', $value->mitra_id)
                                                    ->pluck('nomor_hp')[0];
                                            @endphp
                                            <a href="https://wa.me/{{ $mitra }}"
                                                class="btn btn-accent text-white" target="_blank"><i
                                                    data-feather="message-circle"></i>Chat
                                                Mitra</a>
                                        @elseif($value->status_id == 3)
                                            <a href="{{ url('/luaran-download') }}/{{ $value->output }}"
                                                class="btn btn-neutral text-white"><i data-feather="download"
                                                    class="text-white"></i>Download</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <dialog id="addVideo" class="modal">
        <div class="modal-box">
            <form class="flex flex-col gap-3" action="{{ route('add-video') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <textarea name="keterangan" placeholder="Keterangan Editing" class="textarea textarea-bordered textarea-lg w-full"></textarea>
                <input name="unggahan" type="file" class="file-input file-input-bordered w-full"
                    accept=".rar, .zip, .7z" />
                <button type="submit" class="btn btn-success text-white mt-5">Tambah</button>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

</x-app-layout>
