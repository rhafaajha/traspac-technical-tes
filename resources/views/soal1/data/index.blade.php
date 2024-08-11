<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Data Pegawai PNS</title>

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

<body class="user">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Data Pegawai PNS</span>
            </a>
        </div>
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

    <!-- ======= MAIN ======= -->
    <main id="main-user" class="main user">
        <section class="section user">
            <!-- Table Data Proses -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a type="button" class="btn btn-primary m-2" href="{{ route('tambahdata') }}"
                                title="Tambah data pegawai">Tambah
                                Data</a>

                            <!-- Table Data -->
                            <div class="table-responsive">
                                <table id="data" class="table datatable table-hover align-middle"
                                    style="width: 100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tempat Lahir</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Tanggal Lahir</th>
                                            <th scope="col">L/P</th>
                                            <th scope="col">Gol</th>
                                            <th scope="col">Eselon</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tempat Tugas</th>
                                            <th scope="col">Agama</th>
                                            <th scope="col">Unit Kerja</th>
                                            <th scope="col">No. HP</th>
                                            <th scope="col">NPWP</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datas)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($datas->foto)
                                                        <img src="{{ asset($datas->foto) }}" alt="Foto Pegawai"
                                                            class="img-thumbnail" width="100" style="cursor:pointer;"
                                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                                            data-bs-src="{{ asset($datas->foto) }}" />
                                                    @else
                                                        <img src="https://img.freepik.com/free-vector/user-blue-gradient_78370-4692.jpg?t=st=1723360461~exp=1723364061~hmac=36053a1bfb656a4118d60049824b23a06971d36b33f76d59c27ab5f84d9931ba&w=826"
                                                            alt="Foto Pegawai" class="img-thumbnail" width="100"
                                                            style="cursor:pointer;" data-bs-toggle="modal"
                                                            data-bs-target="#imageModal"
                                                            data-bs-src="https://img.freepik.com/free-vector/user-blue-gradient_78370-4692.jpg?t=st=1723360461~exp=1723364061~hmac=36053a1bfb656a4118d60049824b23a06971d36b33f76d59c27ab5f84d9931ba&w=826" />
                                                    @endif
                                                </td>
                                                <td>{{ $datas->nip }}</td>
                                                <td>{{ $datas->nama }}</td>
                                                <td>{{ $datas->tempat_lahir }}</td>
                                                <td>{{ $datas->alamat }}</td>
                                                <td>{{ \Carbon\Carbon::parse($datas->tanggal_lahir)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    {{ $datas->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                                                </td>
                                                <td>{{ $datas->golongan_id ? $datas->golongan->kode : 'N/A' }}</td>
                                                <td>{{ $datas->eselon_id ? $datas->eselon->kode : 'N/A' }}</td>
                                                <td>{{ $datas->jabatan_id ? $datas->jabatan->jabatan : 'N/A' }}</td>
                                                <td>{{ $datas->tempat_tugas_id ? $datas->tempat_tugas->tempat_tugas : 'N/A' }}
                                                </td>
                                                <td>{{ $datas->agama_id ? $datas->agama->nama_agama : 'N/A' }}</td>
                                                <td>{{ $datas->unit_kerja_id ? $datas->unit_kerja->unit_kerja : 'N/A' }}
                                                </td>
                                                <td>{{ $datas->no_hp ?? 'N/A' }}</td>
                                                <td>{{ $datas->npwp ?? 'N/A' }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary m-1"
                                                        href="{{ route('edit', $datas->id) }}">
                                                        <i class="bi bi-pencil-square edit"
                                                            title="Update data pegawai {{ $datas->nama }}"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger m-1"
                                                        data-id="{{ $datas->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal-{{ $datas->id }}"
                                                        title="Hapus data pegawai {{ $datas->nama }}">
                                                        <i class="bi bi-trash3 delete"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Delete -->
                                            <div id="deleteModal-{{ $datas->id }}" class="modal fade"
                                                tabindex="-1" role="dialog" aria-labelledby="deleteModal"
                                                aria-hidden="true">
                                                <div class=" modal-dialog modal-dialog-centered" role="document">
                                                    <form action="{{ route('destroy', $datas->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="modal-title">Delete
                                                                    Data:
                                                                    <strong>{{ $datas->nama }}</strong>
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-muted" id="modal-name">Jika Anda
                                                                    menghapus
                                                                    <strong>{{ $datas->nama }}</strong> will
                                                                    akan hilang selamanya. Apakah Anda yakin akan
                                                                    menghapus
                                                                    <strong>{{ $datas->nama }}</strong>?.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">Tidak</button>
                                                                <button type="submit" class="btn btn-danger">Ya,
                                                                    Hapus</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- End Modal Delete -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Data Proses -->
        </section>
    </main>
    <!-- End #main -->

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

    <!-- Modal Preview Image-->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Preview Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="imageModalSrc" class="img-fluid" alt="Foto Pegawai">
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

    <script type="text/javascript">
        $(document).ready(function() {
            const table = new DataTable('#data', {
                processing: true,
                columnDefs: [{
                        targets: [0, 1, 16],
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: [0, 1, 8, 9, 16],
                        className: 'dt-body-center'
                    }
                ],
                order: [
                    [0, 'DESC'],
                ],
                fixedHeader: true,
                orderMulti: true,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                pagingType: 'full_numbers',
                language: {
                    emptyTable: "Tidak ada data yang tersedia",
                    infoEmpty: "Tidak ada data yang tersedia",
                    lengthMenu: "_MENU_ entries per page",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    search: "",
                    searchPlaceholder: "Cari ...",
                    paginate: {
                        first: '&laquo;',
                        last: '&raquo;',
                        previous: '&lsaquo;',
                        next: '&rsaquo;'
                    }
                },
                scrollX: true,
                scrollY: true,
                scrollCollapse: true,
                dom: '<"row"<"col text-start"l><"col"f><"col text-end"B>>t<"row"<"col"i><"col"p>>',
                buttons: [{
                        extend: 'excel',
                        text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                        titleAttr: 'Export to Excel',
                        className: 'btn btn-primary m-1',
                        filename: 'Data PNS_' + formatDate(new Date()),
                    },
                    {
                        extend: 'print',
                        text: '<i class="bi bi-printer"></i> Print',
                        titleAttr: 'Print Document',
                        className: 'btn btn-primary m-1',
                        footer: true,
                        exportOptions: {
                            columns: function(idx, data, node) {
                                // Menyertakan kolom yang bukan kolom dengan indeks 1 dan 16
                                return idx !== 1 && idx !== 16;
                            },
                            modifier: {
                                page: 'current'
                            }
                        },
                        pageSize: 'A4',
                        orientation: 'landscape',
                        customize: function(win) {
                            var currentDate = new Date();
                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            var printDate = currentDate.toLocaleDateString('id-ID', options);
                            var printTime = currentDate.toLocaleTimeString();

                            $(win.document.body).find('h1').remove();
                            $(win.document.body)
                                .prepend(
                                    '<h5 class="text-center"><strong>DAFTAR PEGAWAI</strong></h5>' +
                                    '<h6 class="text-center">Nama Lembaga/Instansi</h6>'
                                );

                            $(win.document.body).find('table thead').addClass('table-dark');
                            $(win.document.body).find('table tfoot').addClass('table-secondary');
                            $(win.document.body).find('table thead th, table tfoot th').addClass(
                                'text-center');

                            $(win.document.body).find('table tbody').css({
                                'background-color': '#fff',
                                'color': '#1e1e2f'
                            });

                            $(win.document.body)
                                .append(
                                    '<div class="text-end"><h6>Data ini dicetak pada tanggal <strong>' +
                                    printDate + '</strong> pukul <strong>' + printTime +
                                    '</strong> oleh <strong>' + '{{ Auth::user()->name }}' +
                                    '</strong></h6></div>'
                                );
                        }
                    },
                ],
            });

            // Update the row numbers after sorting or searching
            table
                .on('order.dt search.dt', function() {
                    let i = 1;
                    table
                        .cells(null, 0, {
                            search: 'applied',
                            order: 'applied'
                        })
                        .every(function(cell) {
                            this.data(i++);
                        });
                })
                .draw();

            // Function to format date
            function formatDate(date) {
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            }
        });
    </script>
</body>

</html>
