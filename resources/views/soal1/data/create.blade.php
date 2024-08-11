<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Tambah Data Pegawai PNS</title>

    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Data Pegawai PNS</span>
        </a>
        <!-- End Logo -->
        <nav class="header-nav ms-auto">
            <form action="{{ route('logout') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary" id="Logout" title="Logout from your Account">
                    <i class="bi bi-box-arrow-in-left"></i>&nbsp;&nbsp;Logout
                </button>
            </form>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- === Main Page ==== -->
    <main id="main" class="main">
        <section class="section daftar" id="daftar">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('dashboard') }}">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                                &nbsp;&nbsp;Tambah Data Pegawai
                            </h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('tambahdata.store') }}" method="POST" enctype="multipart/form-data"
                                id="formDaftar" class="needs-validation" novalidate>
                                @csrf

                                <div class="row mb-3">
                                    <!-- NIP -->
                                    <label for="inputNIP" class="col-sm-1 col-form-label form-label">NIP</label>
                                    <div class="col">
                                        <input type="number" id="inputNIP" name="inputNIP" class="form-control"
                                            placeholder="Masukkan NIP" required value="{{ old('inputNIP') }}" />
                                        <div class="invalid-feedback"> Harap masukkan NIP. </div>
                                        @error('inputNIP')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <label class="col-sm-1 col-form-label form-label"></label> --}}

                                    <!-- NAMA -->
                                    <label for="inputNama" class="col-sm-1 col-form-label form-label">Nama</label>
                                    <div class="col">
                                        <input type="text" id="inputNama" name="inputNama" class="form-control"
                                            placeholder="Masukkan Nama" required value="{{ old('inputNama') }}" />
                                        <div class="invalid-feedback"> Harap masukkan nama. </div>
                                        @error('inputNama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Tempat Lahir -->
                                    <label for="inputTempatLahir" class="col-sm-1 col-form-label form-label">Tempat
                                        Lahir</label>
                                    <div class="col">
                                        <input type="text" id="inputTempatLahir" name="inputTempatLahir"
                                            class="form-control" placeholder="Masukkan Tempat Lahir" required
                                            value="{{ old('inputTempatLahir') }}" />
                                        <div class="invalid-feedback"> Harap masukkan tempat lahir. </div>
                                        @error('inputTempatLahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Edit -->
                                    <label for="inputTanggalLahir" class="col-sm-1 col-form-label form-label">Tanggal
                                        Lahir</label>
                                    <div class="col">
                                        <input type="date" id="inputTanggalLahir" name="inputTanggalLahir"
                                            class="form-control" value="{{ old('inputTanggalLahir') }}" required />
                                        <div class="invalid-feedback"> Harap masukkan tanggal lahir. </div>
                                        @error('inputTanggalLahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Alamat -->
                                    <label for="inputAlamat" class="col-sm-1 col-form-label form-label">Alamat</label>
                                    <div class="col">
                                        <textarea id="inputAlamat" name="inputAlamat" class="form-control" placeholder="Masukkan Alamat" required>{{ old('inputAlamat') }}</textarea>
                                        <div class="invalid-feedback"> Harap masukkan alamat. </div>
                                        @error('inputAlamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <label for="inputGender" class="col-sm-1 col-form-label form-label">Jenis
                                        Kelamin</label>
                                    <div class="col">
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inputGender"
                                                    id="inlineRadio1" value="L"
                                                    {{ old('inputGender') == 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inputGender"
                                                    id="inlineRadio2" value="P"
                                                    {{ old('inputGender') == 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback"> Harap pilih gender. </div>
                                        @error('inputGender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Golongan -->
                                    <label for="inputGolongan"
                                        class="col-sm-1 col-form-label form-label">Golongan</label>
                                    <div class="col">
                                        <select class="form-select" name="inputGolongan" id="inputGolongan"
                                            aria-label="Pilih Golongan" required>
                                            <option value="" {{ old('inputGolongan') == '' ? 'selected' : '' }}
                                                disabled>Pilih Golongan</option>
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}"
                                                    {{ old('inputGolongan') == $golongan->id ? 'selected' : '' }}>
                                                    {{ $golongan->kode }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Harap pilih golongan. </div>
                                        @error('inputGolongan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Eselon -->
                                    <label for="inputEselon" class="col-sm-1 col-form-label form-label">Eselon</label>
                                    <div class="col">
                                        <select class="form-select" name="inputEselon" id="inputEselon"
                                            aria-label="Pilih Eselon" required>
                                            <option value="" {{ old('inputEselon') == '' ? 'selected' : '' }}
                                                disabled>Pilih Eselon</option>
                                            @foreach ($eselons as $eselon)
                                                <option value="{{ $eselon->id }}"
                                                    {{ old('inputEselon') == $eselon->id ? 'selected' : '' }}>
                                                    {{ $eselon->kode }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Harap pilih eselon. </div>
                                        @error('inputEselon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Eselon -->
                                    <label for="inputJabatan"
                                        class="col-sm-1 col-form-label form-label">Jabatan</label>
                                    <div class="col">
                                        <select class="form-select" name="inputJabatan" id="inputJabatan"
                                            aria-label="Pilih Jabatan" required>
                                            <option value="" {{ old('inputJabatan') == '' ? 'selected' : '' }}
                                                disabled>Pilih Jabatan</option>
                                            @foreach ($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}"
                                                    {{ old('inputJabatan') == $jabatan->id ? 'selected' : '' }}>
                                                    {{ $jabatan->jabatan }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Harap pilih jabatan. </div>
                                        @error('inputJabatan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tempat Tugas -->
                                    <label for="inputTempatTugas" class="col-sm-1 col-form-label form-label">Tempat
                                        Tugas</label>
                                    <div class="col">
                                        <select class="form-select" name="inputTempatTugas" id="inputTempatTugas"
                                            aria-label="Pilih Tempat Tugas" required>
                                            <option value=""
                                                {{ old('inputTempatTugas') == '' ? 'selected' : '' }} disabled>Pilih
                                                Tempat Tugas</option>
                                            @foreach ($tempatTugas as $tempat)
                                                <option value="{{ $tempat->id }}"
                                                    {{ old('inputTempatTugas') == $tempat->id ? 'selected' : '' }}>
                                                    {{ $tempat->tempat_tugas }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Harap pilih tempat tugas. </div>
                                        @error('inputTempatTugas')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Agama -->
                                    <label for="inputAgama" class="col-sm-1 col-form-label form-label">Agama</label>
                                    <div class="col">
                                        <select class="form-select" name="inputAgama" id="inputAgama"
                                            aria-label="Pilih Agama" required>
                                            <option value="" {{ old('inputAgama') == '' ? 'selected' : '' }}
                                                disabled>Pilih Agama</option>
                                            @foreach ($agamas as $agama)
                                                <option value="{{ $agama->id }}"
                                                    {{ old('inputAgama') == $agama->id ? 'selected' : '' }}>
                                                    {{ $agama->nama_agama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Harap pilih agama. </div>
                                        @error('inputAgama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Unit Kerja -->
                                    <label for="inputUnitKerja" class="col-sm-1 col-form-label form-label">Unit
                                        Kerja</label>
                                    <div class="col">
                                        <select class="form-select" name="inputUnitKerja" id="inputUnitKerja"
                                            aria-label="Pilih Unit Kerja" required>
                                            <option value="" {{ old('inputUnitKerja') == '' ? 'selected' : '' }}
                                                disabled>Pilih Unit Kerja</option>
                                            @foreach ($unitKerjas as $unitKerja)
                                                <option value="{{ $unitKerja->id }}"
                                                    {{ old('inputUnitKerja') == $unitKerja->id ? 'selected' : '' }}>
                                                    {{ $unitKerja->unit_kerja }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"> Harap pilih unit kerja. </div>
                                        @error('inputUnitKerja')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- No. HP -->
                                    <label for="inputNoHP" class="col-sm-1 col-form-label form-label">No. HP</label>
                                    <div class="col">
                                        <input type="tel" id="inputNoHP" name="inputNoHP" class="form-control"
                                            placeholder="Masukkan Nomor HP" required
                                            value="{{ old('inputNoHP') }}" />
                                        <div class="invalid-feedback"> Harap masukkan nomor handphone. </div>
                                        @error('inputNoHP')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- NPWP -->
                                    <label for="inputNPWP" class="col-sm-1 col-form-label form-label">NPWP</label>
                                    <div class="col">
                                        <input type="number" id="inputNPWP" name="inputNPWP" class="form-control"
                                            placeholder="Masukkan NPWP" required value="{{ old('inputNPWP') }}" />
                                        <div class="invalid-feedback"> Harap masukkan NPWP. </div>
                                        @error('inputNPWP')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputFoto" class="col-sm-1 col-form-label form-label">Foto
                                        Pegawai</label>
                                    <div class="col">
                                        <input class="form-control" type="file" id="inputFoto" name="inputFoto"
                                            accept="image/*" />
                                        <div class="invalid-feedback"> Harap upload foto pegawai. </div>
                                        @error('inputFoto')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row text-end">
                                    <div class="col">
                                        <button type="button" name="reset" id="resetForm" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#confirmResetModal">Batal</button>
                                        <button type="submit" name="submit" id="submitForm"
                                            class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Toast -->
    @if (session()->has('pesan'))
        @php
            $toastClass = session()->get('success') == true ? 'text-bg-primary' : 'text-bg-danger';
        @endphp
        <div class="toast align-items-center {{ $toastClass }}" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('pesan') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmResetModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmResetLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmResetLabel">Konfirmasi Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin membatalkan? Semua data yang sudah diisi akan dihapus.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a type="reset" class="btn btn-danger" id="confirmReset" href="{{ route('dashboard') }}">Ya,
                        Hapus</a>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Additional Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
