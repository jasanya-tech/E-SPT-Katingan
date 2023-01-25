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
            @forelse ($registrasi as $register)
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col my-3">
                        <div class="card text-light bg-success" style="cursor: pointer">
                            <div class="card-body text-center">
                                <h5 class="card-title text-capitalize">SPT 1</h5>
                                <h4>syahrul</h4>
                                <p>594.4/555/XII/KT/PEM</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <h3>Belum Memiliki SPT Registrasi</h3>
                </div>
            @endforelse
            <form action="{{ '/guest/registrasi' }}" class="card my-3" method="POST">
                @csrf
                <div class="card-body px-5 my-4">
                    <div class="row row-cols-1 row-cols-md-2">
                        <x-input name="no_registrasi" type="text" required value="594.4/555/XII/KT/PEM" readonly />
                        <x-input name="nama_pemilik_SPT" type="text" required value="{{ $nama_pemilik }}">
                        </x-input>
                        <x-input name="luas_tanah" label="luas tanah (m)" type="number" required step="any">
                        </x-input>
                        <div class="col mb-3">
                            <label class="form-label">Tanggal Registrasi</label>
                            <input type="date" class="form-control" readonly value="{{ date('Y-m-d') }}">
                        </div>
                        <x-input name="perbatasan_tanah_utara" type="textarea" required rows="3"></x-input>
                        <x-input name="perbatasan_tanah_timur" type="textarea" required rows="3"></x-input>
                        <x-input name="perbatasan_tanah_barat" type="textarea" required rows="3"></x-input>
                        <x-input name="perbatasan_tanah_selatan" type="textarea" required rows="3"></x-input>
                        <x-input name="alamat" type="textarea" required rows="3"></x-input>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layouts.guest.index>
