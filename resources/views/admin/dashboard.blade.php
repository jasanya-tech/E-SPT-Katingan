<x-layouts.admin.index title="Dashboard">
    <x-layouts.admin.header></x-layouts.admin.header>
    <x-layouts.admin.sidebar></x-layouts.admin.sidebar>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Registrasi <span>| SPT</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>{{ $countRegistrasi }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Diprosess <span>| SPT</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>{{ $countDiproses }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Pengambilan <span>| SPT</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>{{ $countPengambilan }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Data Registrasi<span> | SPT</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO Registrasi</th>
                                                <th scope="col">Nama Pemilik SPT</th>
                                                <th scope="col">Jumlah SPT</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registrasi as $reg)
                                                <tr>
                                                    <th scope="row"><a href="#">{{ $reg->no_registrasi }}</a>
                                                    </th>
                                                    <td>{{ $reg->nama_pemilik_SPT }}</td>
                                                    <td>
                                                        {{ $reg->jumlah_SPT }}
                                                    </td>
                                                    <td>
                                                        @if ($reg->status == 'diproses')
                                                            <span class="badge bg-warning">{{ $reg->status }}</span>
                                                        @else
                                                            <span class="badge bg-success">{{ $reg->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm"
                                                            onclick="return confirm('SPT ini yakin sudah selesai?')">selesai
                                                            proses</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->
</x-layouts.admin.index>
