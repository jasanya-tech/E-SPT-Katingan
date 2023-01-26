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
            <form action="{{ '/guest/pendaftaran' }}" class="card my-3" method="POST">
                @csrf
                <div class="card-body px-5 my-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <x-input name="nama_pemilik" required="true" />
                        <x-input name="nama_pendaftar" required="true" />
                        <x-input name="jumlah_SPT" type="number" required="true"></x-input>
                        <div class="col mb-3">
                            <label class="form-label">Tanggal Mendaftar</label>
                            <input type="date" class="form-control" readonly value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layouts.guest.index>
