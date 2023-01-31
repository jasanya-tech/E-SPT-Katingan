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
                        <th class="text-center">
                            @if ($registrasi->status == 'menunggu')
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Ambil</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="/guest/pengambilan" method="POST" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ambil SPT</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                @csrf
                                                <input type="text" class="d-none"
                                                    value="{{ $registrasi->no_registrasi }}" name="no_registrasi">
                                                <x-input name="nama_pemilik" value="{{ $registrasi->nama_pemilik_SPT }}"
                                                    readonly />
                                                <x-input name="jumlah_SPT" value="{{ $registrasi->jumlah_SPT }}"
                                                    readonly />
                                                <div class="mb-3" style="margin: 150 auto;">
                                                    <label class="form-label">Tanggal Pengambilan</label>
                                                    <input type="date" class="form-control" readonly
                                                        value="{{ date('Y-m-d') }}">
                                                </div>
                                                <style>
                                                    #sig {
                                                        border: 2px solid #444;
                                                        border-radius: 15px;
                                                        background-color: #fafafa;
                                                    }
                                                </style>
                                                <div class="mb-3 d-flex flex-column align-items-center">
                                                    <label class="form-label">Tanda Tangan</label>
                                                    <canvas id="sig"></canvas>
                                                    <input type="button" class="btn btn-warning mt-2" value="Reset"
                                                        id="resetSign" />
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="submit" class="btn btn-primary">Ambil</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('assets\plugins\datatable\datatables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/signature/sign.js') }}"></script>
    @endpush
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
            });
            $("#sig").sign({
                resetButton: $("#resetSign"),
                lineWidth: 2,
                height: 200,
                width: 300,
            });
        });
    </script>
</x-layouts.guest.index>
