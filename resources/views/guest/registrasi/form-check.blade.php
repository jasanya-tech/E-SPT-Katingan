<x-layouts.guest.index title="{{ $title }}">
    <x-layouts.guest.navbar title="{{ $title }}" />

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
            <form action="{{ '/guest/check-registrasi' }}" class="card my-3" method="GET">
                <div class="card-body px-5 my-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <x-input name="nama_pemilik_SPT" type="text" required
                            placeholder="Masukan nama pemilik SPT" />
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Check Registrasi</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layouts.guest.index>
