@push('js')
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();

            var tableTransaksi = $('#transaksi').DataTable({
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    <h5 class="mb-3"><b>Data Mitra</b></h5>
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mitra</th>
                                <th>Nomor HP</th>
                                <th>Nomor Rekening</th>
                                <th>Nama Rekening</th>
                                <th>Resume</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ref_mitra as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->nomor_hp }}</td>
                                    <td>{{ $value->nomor_rekening }}</td>
                                    <td>{{ $value->nama_rekening }}</td>
                                    <td><a href="{{ url('resume-download') }}/{{ $value->resume }}"
                                            class="btn btn-primary"><i data-feather="eye" class="text-white"></i></a>
                                    </td>
                                    <td>
                                        @if ($value->is_active == 1)
                                            <span
                                                class="bg-green-200 text-green-900 px-5 py-1 font-bold rounded-full">Aktif</span>
                                        @else
                                            <span class="bg-red-200 text-red-900 px-3 py-1 font-bold rounded-full">Belum
                                                Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->is_active != 1)
                                            <form method="post"
                                                action="{{ url('action-mitra') }}/{{ $value->mitra_id }}/1">
                                                @csrf
                                                @method('patch')
                                                <button type="submit"
                                                    class="btn btn-success text-white">Aktifkan</button>
                                            </form>
                                        @else
                                            <form method="post"
                                                action="{{ url('action-mitra') }}/{{ $value->mitra_id }}/0">
                                                @csrf
                                                @method('patch')
                                                <button type="submit"
                                                    class="btn btn-error text-white">Nonaktifkan</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    <h5 class="mb-3"><b>Data Transaksi</b></h5>
                    <table id="transaksi" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Klien</th>
                                <th>Mitra</th>
                                <th>Unggahan</th>
                                <th>Output</th>
                                <th>Status</th>
                                <th>Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->user_id }}</td>
                                    <td>{{ $value->mitra_id }}</td>
                                    <td><a class="btn btn-success"
                                            href="{{ url('unggahan-download') }}/{{ $value->file_unggahan }}"><i
                                                data-feather="download" class="text-white"></i></a>
                                    </td>
                                    <td><a class="btn btn-primary"
                                            href="{{ url('luaran-download') }}/{{ $value->output }}"><i
                                                data-feather="download" class="text-white"></i></a></td>
                                    <td>{{ $value->status_id }}</td>
                                    <td>
                                        {{ $value->updated_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
