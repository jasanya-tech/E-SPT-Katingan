@props(['title' => 'Tidak ada'])

<nav class="navbar bg-primary sticky-0">
    <div class="container text-light d-flex gap-3 justify-content-center">
        <img src="{{ asset('storage/images/logo-katingan.png') }}" alt="" width="50" height="50">
        <p class="h3 text-truncate">
            {{ $title }}
        </p>
    </div>
</nav>
