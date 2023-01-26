<x-layouts.guest.index title="{{ $title }}">
    <x-layouts.guest.navbar title="{{ $title }}" />
    <section class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-3">
                <div class="card bg-primary text-light p-3 m-3" style="cursor: pointer"
                    onclick="window.location.href = '/guest/pendaftaran/create'"">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/images/UI/form-pendaftaran.png') }}" style="width: 50%">
                        <h5 class="card-title">Form Pendaftaran SPT</h5>
                        <p class="text-center m-0">
                            jika belum memiliki surat penguasaan tanah
                        </p>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card bg-info text-light p-3 m-3" style="cursor: pointer">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/images/UI/find-registrasi.png') }}" style="width: 50%">
                        <h5 class="card-title">Cek Status Registrasi SPT</h5>
                        <p class="text-center m-0">jika sudah melakukan registrasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.guest.index>
