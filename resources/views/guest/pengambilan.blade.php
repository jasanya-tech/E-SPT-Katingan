<x-layouts.guest.index>
    <x-layouts.guest.navbar title="Form Pendaftaran SPT Katingan" />
    <div class="container">
        <style>
            #sig {
                border: 4px solid #444;
                border-radius: 15px;
                background-color: #fafafa;
            }
        </style>
    </div>
    <section>
        <div class="container d-flex my-3" id="form-pendaftaran-SPT">
            <x-rekappendaftar></x-rekappendaftar>
            @php
                $message = 'halo guys';
            @endphp
            {{-- <x-alert type="danger" :message="$message" class="mb-4" /> --}}
            <form action="{{ '/guest/pengambilan' }}" class="card my-3" method="POST">
                @csrf
                <div class="card-body px-5 my-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <x-input name="nama_pemilik" type="text" required="true" value="coba" />
                        <x-input name="jumlah_SPT" type="number" required="true" value="1" />
                        <div class="col mb-3">
                            <label class="form-label">Tanggal Pengambilan</label>
                            <input type="date" class="form-control" readonly value="{{ date('Y-m-d') }}">
                        </div>
                        <style>
                            /* Styles for signature plugin v1.2.0. */
                            .kbw-signature {
                                display: block;
                                border: 1px solid #a0a0a0;
                                -ms-touch-action: none;
                                width: 50vw;
                                height: 240px;
                            }

                            .kbw-signature:hover {
                                pointer-events: none !important;
                            }

                            .kbw-signature-disabled {
                                opacity: 0.35;
                            }
                        </style>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Pengambilan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('scripts')
        {{-- Load JQuery --}}
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/signature/sign.js') }}"></script>
    @endpush
    <script>
        $(document).ready(function() {
            $("#sig").sign({
                resetButton: $("#resetSign"),
                lineWidth: 2,
                height: 300,
                width: 400,
            });
        });
    </script>
</x-layouts.guest.index>
