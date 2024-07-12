@push('js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="
                                                                                        SB-Mid-client-dFnyk7kN4t2LYJ0k
                                                                                        "></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $token }}', {
                // Optional
                onSuccess: function(result) {
                    window.location.href = '/setcount'
                },
            });
        };
    </script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5 text-center">
                    <p>Biaya Langganan : Rp. 2.499.000</p>
                    <button id="pay-button" class="btn btn-primary">Pay!</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
