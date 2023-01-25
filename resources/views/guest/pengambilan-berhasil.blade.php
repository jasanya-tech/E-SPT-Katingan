<x-layouts.guest.index title="{{ $title }}">
    <x-layouts.guest.navbar title="{{ $title }}" />
    <style>
        #sig {
            border: 4px solid #444;
            border-radius: 15px;
            background-color: #fafafa;
        }
    </style>
    <canvas id="sig"></canvas><br /><br />
    <input type="button" value="Reset" id="resetSign" />
    <div class="d-flex justify-content-center align-items-center">
        <div class="card shadow">
            <div class="card-body">
                <div class="success-animation">

                </div>
                <h1>Berhasil</h1>
            </div>
        </div>
    </div>
    @push('scripts')
        {{-- Load JQuery --}}
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/signature/sign.js') }}"></script>
    @endpush
    <script>
        $(document).ready(function() {
            $("#sig").sign({
                resetButton: $("#resetSign"),
                lineWidth: 5,
                height: 300,
                width: 400,
            });
        });
    </script>
</x-layouts.guest.index>
