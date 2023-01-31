<x-layouts.admin.index title="Dashboard">
    <x-layouts.admin.header></x-layouts.admin.header>
    <x-layouts.admin.sidebar></x-layouts.admin.sidebar>

    <main id="main" class="main">
        @if (session('error'))
            <x-alert type="danger" :message="session('error')" class="mb-4" />
        @endif
        @if (session('success'))
            <x-alert type="success" :message="session('success')" class="mb-4" />
        @endif
        @error('document_SPT')
            <x-alert type="danger" :message="'Gagal ' . $message"></x-alert>
        @enderror
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
                                            @php
                                                $no = 0;
                                            @endphp
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
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal{{ $no }}">selesai
                                                            proses</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modal{{ $no }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <form class="modal-content" action="/admin/confirm-reg"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModalLabel">Upload Berkas SPT
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        <input type="text" class="d-none"
                                                                            value="{{ $reg->no_registrasi }}"
                                                                            name="no_registrasi">
                                                                        <x-input name="document_SPT" type="file"
                                                                            accept="application/pdf" />
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
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
