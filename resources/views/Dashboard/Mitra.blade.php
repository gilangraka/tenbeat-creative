@push('js')
    <script>
        $(document).ready(function() {

            var table = $('#listProject').DataTable({
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
            <div class="flex flex-col justify-center gap-4 p-4 bg-white w-1/4 shadow-sm sm:rounded-lg">
                <h5><b>Saldo Saat Ini</b></h5>
                <h5 class="text-gray-400">Rp. {{ number_format($saldo, 0, ',', '.') }}</h5>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    <h5 class="mb-3"><b>List Project</b></h5>
                    <table id="listProject" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keterangan Edit</th>
                                <th>Unggahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_project as $key => $value)
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
                                        <form action="{{ route('apply-project') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="id_trx" value="{{ $value->id }}">
                                            <button type="submit" class="btn btn-success text-white"><i
                                                    data-feather="check-square"></i>Apply</button>
                                        </form>
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
