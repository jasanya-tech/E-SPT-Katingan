<x-layouts.guest.index title="{{ $title }}">
    <x-layouts.guest.navbar title="{{ $title }}" />
    @push('css')
        {{-- Load JQuery --}}
        <link rel="stylesheet" href="{{ asset('assets\plugins\datatable\datatables.min.css') }}">
    @endpush
    <section>
        <div class="container mt-2">
            @if (session('error'))
                <x-alert type="danger" :message="session('error')" class="mb-4" />
            @endif
            @if (session('success'))
                <x-alert type="success" :message="session('success')" class="mb-4" />
            @endif
        </div>
        <div class="container d-flex my-3" id="form-SPT">
            <x-RekapPendaftar></x-RekapPendaftar>
            <table id="example" class="display table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Registrasi</th>
                        <th>Nama Pemilik</th>
                        <th class="text-center">Jumlah SPT</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>{{ $registrasi->no_registrasi }}</th>
                        <th>{{ $registrasi->nama_pemilik_SPT }}</th>
                        <th class="text-center">{{ $registrasi->jumlah_SPT }}</th>
                        <th class="text-center">{{ $registrasi->status }}</th>
                        <th class="text-center"></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    @push('scripts')
        {{-- Load JQuery --}}
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets\plugins\datatable\datatables.min.js') }}"></script>
    @endpush
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
            });
        });
    </script>
</x-layouts.guest.index>
