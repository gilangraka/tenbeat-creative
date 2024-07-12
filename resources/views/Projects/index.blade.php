@push('js')
    <script>
        $(document).ready(function() {

            var table = $('#myProject').DataTable({
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
            {{ __('Project Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    <table id="myProject" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keterangan Edit</th>
                                <th>Unggahan</th>
                                <th>Luaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $key => $value)
                                <tr class="text-center">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->keterangan }}</td>
                                    <td><a href="{{ url('unggahan-download') }}/{{ $value->file_unggahan }}"
                                            class="btn btn-primary"><i data-feather="eye"></i></a></td>
                                    <td>
                                        @if ($value->status_id == 2)
                                            <div class="flex gap-2 justify-center items-center">
                                                <form id="uploadForm[{{ $key }}]"
                                                    action="{{ route('set-luaran') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <a class="btn btn-success text-white"
                                                        onclick="document.getElementById('fileInput[{{ $key }}]').click();"><i
                                                            data-feather="upload"></i></a>
                                                    <input type="hidden" name="trx_id"
                                                        value="{{ $value->transaksi_id }}">
                                                    <input type="file" id="fileInput[{{ $key }}]"
                                                        name="luaran" class="hidden" accept=".zip, .rar, .7z" />

                                                    <script>
                                                        document.getElementById('fileInput[{{ $key }}]').addEventListener('change', function(event) {
                                                            // Automatically submit the form when a file is selected
                                                            document.getElementById('uploadForm[{{ $key }}]').submit();
                                                        });
                                                    </script>
                                                </form>
                                                @if ($value->output != null)
                                                    <a href="{{ url('luaran-download') }}/{{ $value->output }}"
                                                        class="btn btn-neutral"><i data-feather="eye"></i></a>
                                            </div>
                                        @endif
                                    @else
                                        <a class="btn btn-neutral text-white"
                                            href="{{ url('luaran-download') }}/{{ $value->output }}"><i
                                                data-feather="download"></i>Download</a>
                            @endif
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
                                    <div class="flex gap-2 justify-center items-center">
                                        <a href="https://wa.me/{{ $value->nomor_hp }}"
                                            class="btn btn-accent text-white" target="_blank"><i
                                                data-feather="message-circle"></i>Chat
                                            Klien</a>
                                        <form action="{{ url('set-selesai') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="trx_id" value="{{ $value->transaksi_id }}">
                                            <button type="submit" class="btn bg-neutral text-white"><i
                                                    data-feather="check-square"></i>Sudah
                                                Selesai</button>
                                        </form>
                                    </div>
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
</x-app-layout>
