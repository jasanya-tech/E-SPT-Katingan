<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/registrasi/menunggu">
                <i class="bi bi-journal-text"></i>
                <span>menunggu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/registrasi/selesai">
                <i class="bi bi-journal-text"></i>
                <span>diambil</span>
            </a>
        </li>
    </ul>
</aside>
@push('scripts')
    {{-- Load JQuery --}}
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/signature/sign.js') }}"></script>
@endpush
<script>
    $(document).ready(function() {
        $.each($('#sidebar-nav').children().find('a'), function(index, value) {
            $path = [];
            for (var i = 0; i < value.href.split('/').length; i++) {
                if (i > 2) {
                    $path.push(value.href.split('/')[i]);
                }
            }
            if (window.location.pathname.includes($path.join('/'))) {
                $(this).removeClass('collapsed');
            }
        })
    });
</script>
<!-- End Sidebar-->
