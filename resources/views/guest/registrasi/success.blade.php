<x-layouts.guest.index title="{{ $title }}">
    <x-layouts.guest.navbar title="{{ $title }}" />
    <div class="container d-flex justify-content-center mt-5">
        <div class="card p-3 m-3">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('assets/images/UI/berhasil.gif') }}" style="width: 20%">
                <h3 class="text-success">Registrasi Berhasil</h3>
                <p class="text-center">silahkan check status pembuatan secara berkala</p>
                <a href="/guest/check-registrasi?nama_pemilik_SPT={{ $nama_pemilik_SPT }}"
                    class="btn btn-primary">Disini</a>
            </div>
        </div>
    </div>
</x-layouts.guest.index>
