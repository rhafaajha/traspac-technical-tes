<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>FFM Bot</title>

    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
</head>

<body class="user">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('image/logo-laravel-1024.png') }}" alt="" />
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
                            <h5 class="card-title">Status Order<span> | Solving All Data</span></h5>

                            <!-- Table Data -->
                            <div class="table-responsive">
                                <table class="table datatable table-hover align-middle" id="dataUser"
                                    style="width: 100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Timestamp</th>
                                            <th scope="col">Tiket FFM</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama Pelapor</th>
                                            <th scope="col">Layanan</th>
                                            <th scope="col">Datel</th>
                                            <th scope="col">Order-ID</th>
                                            <th scope="col">Tipe Order</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Keterangan Lengkap</th>
                                            <th scope="col">PIC</th>
                                            <th scope="col">Leason Learned</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Timestamp Hasil</th>
                                            <th scope="col">PIC Eskalasi</th>
                                            <th scope="col">Leason Learned Eskalasi</th>
                                            <th scope="col">Status Eskalasi</th>
                                            <th scope="col">Timestamp Eskalasi</th>
                                        </tr>
                                    </thead>
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

    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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

    {{-- <script type="text/javascript">
        function formatDate(date) {
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');

            var hour = date.getHours().toString().padStart(2, '0');
            var minute = date.getMinutes().toString().padStart(2, '0');
            var second = date.getSeconds().toString().padStart(2, '0');

            return day + '-' + month + '-' + year + ' ' + hour + '.' + minute + '.' + second;
        }

        $(document).ready(function() {
            var table = $('#dataUser').DataTable({
                processing: true,
                serverSide: true,
                deferLoading: 10,
                deferRender: true,
                ajax: {
                    url: "{{ route('getDataAjax') }}",
                    type: "GET",
                    dataType: "json",
                    error: function(xhr, error, thrown) {
                        console.log('Kesalahan Ajax: ', error);
                    },
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                    },
                    {
                        data: "timestamp",
                        name: "timestamp",
                        searchable: true,
                    },
                    {
                        data: "tiket_ffm",
                        name: "tiket_ffm",
                        searchable: true,
                    },
                    {
                        data: "username_pelapor",
                        name: "username_pelapor",
                        searchable: true,
                    },
                    {
                        data: "nama_pelapor",
                        name: "nama_pelapor",
                        searchable: true,
                    },
                    {
                        data: "layanan",
                        name: "layanan",
                        searchable: true,
                    },
                    {
                        data: "datel",
                        name: "datel",
                        searchable: true,
                    },
                    {
                        data: "order_id",
                        name: "order_id",
                        searchable: true,
                    },
                    {
                        data: "type_order",
                        name: "type_order",
                        searchable: true,
                    },
                    {
                        data: "unit",
                        name: "unit",
                        searchable: true,
                    },
                    {
                        data: "keterangan",
                        name: "keterangan",
                    },
                    {
                        data: "pic",
                        name: "pic",
                    },
                    {
                        data: "leason_learned",
                        name: "leason_learned",
                    },
                    {
                        data: "status",
                        name: "status",
                        searchable: true,
                    },
                    {
                        data: "timestamp_hasil",
                        name: "timestamp_hasil",
                    },
                    {
                        data: "pic_eskalasi",
                        name: "pic_eskalasi"
                    },
                    {
                        data: "leason_learned_eskalasi",
                        name: "leason_learned_eskalasi",
                    },
                    {
                        data: "status_eskalasi",
                        name: "status_eskalasi",
                        searchable: true,
                    },
                    {
                        data: "timestamp_eskalasi",
                        name: "timestamp_eskalasi"
                    }
                ],
                columnDefs: [{
                        targets: 0,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: [0, 5, 6, 7, 8, 9, 13, 17],
                        className: 'dt-body-center'
                    },
                    {
                        targets: [0, 1, 2],
                        className: 'nowrap',
                    },
                    {
                        targets: [10, 12, 16],
                        className: "elipsis",
                        orderable: false,
                    }
                ],
                order: [
                    [2, 'desc'],
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
                    info: "showing _START_ to _END_ of _TOTAL_ data fulfillment",
                    infoEmpty: "showing 0 to 0 of 0 data fulfillment",
                    infoFiltered: "(filtered from _MAX_ total data fulfillment)",
                    search: "",
                    searchPlaceholder: "Search ...",
                    paginate: {
                        first: '&laquo;',
                        last: '&raquo;',
                        previous: '&lsaquo;',
                        next: '&rsaquo;'
                    }
                },
                scrollX: true,
                scrollY: '450px',
                scrollCollapse: true,
                fixedColumns: {
                    leftColumns: 3,
                },
                dom: '<"row"<"col text-start"l><"col"f><"col text-end"B>>t<"row"<"col"i><"col"p>>',
                buttons: [{
                        extend: 'excel',
                        text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                        titleAttr: 'Export to Excel',
                        className: 'btn btn-primary col m-1',
                        filename: 'Status Order cetakan ' + formatDate(new Date()),
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                        titleAttr: 'Export to PDF',
                        className: 'btn btn-primary col m-1',
                        exportOptions: {
                            columns: ':visible',
                            modifier: {
                                page: 'current'
                            },
                        },
                        pageSize: 'A3',
                        orientation: 'landscape',
                        filename: 'Status Order cetakan ' + formatDate(new Date()),
                        customize: function(doc) {
                            var currentDate = new Date();
                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            var printDate = currentDate.toLocaleDateString('id-ID', options);
                            var printTime = currentDate.toLocaleTimeString();

                            doc.styles.tableHeader = {
                                bold: true,
                                color: 'white',
                                fillColor: '#343a40',
                                alignment: 'center'
                            };

                            doc.styles.tableBody = {
                                alignment: 'center'
                            };

                            doc.defaultStyle.fontSize = 8;

                            doc.header = function(currentPage, pageCount) {
                                return {
                                    columns: [{
                                            text: 'Data Fulfillment',
                                            alignment: 'left'
                                        },
                                        {
                                            text: "{{ route('user') }}",
                                            alignment: 'right'
                                        }
                                    ],
                                    margin: [20, 20],
                                    width: 'auto',
                                };
                            };

                            doc.footer = function(currentPage, pageCount) {
                                return {
                                    columns: [{
                                            text: 'Status Order ini dicetak pada tanggal ' +
                                                printDate + ' pukul ' + printTime +
                                                ' oleh Guess Unlogin',
                                            alignment: 'left'
                                        },
                                        {
                                            text: 'Page ' + currentPage.toString() +
                                                ' of ' + pageCount,
                                            alignment: 'right'
                                        },
                                    ],
                                    margin: [20, 20],
                                    width: 'auto',
                                };
                            };
                        },
                    },
                    {
                        extend: 'print',
                        text: '<i class="bi bi-printer"></i> Print',
                        titleAttr: 'Print Document',
                        className: 'btn btn-primary col m-1',
                        // autoPrint: false,
                        footer: true,
                        exportOptions: {
                            columns: ':visible',
                            modifier: {
                                page: 'current'
                            },
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
                                    '<h5 class="text-center"><strong>Data Fulfillment</strong></h5>'
                                );

                            $(win.document.body).find('table thead')
                                .addClass('table-dark');

                            $(win.document.body).find('table tfoot')
                                .addClass('table-secondary');

                            $(win.document.body).find('table thead th, table tfoot th')
                                .addClass('text-center');

                            $(win.document.body).find('table tbody')
                                .css({
                                    'background-color': '#fff',
                                    'color': '#1e1e2f'
                                });

                            // Remove nowrap class from specific columns in thead and tbody
                            $(win.document.body).find('table thead th, table tbody td')
                                .removeClass('nowrap');

                            $(win.document.body)
                                .append(
                                    '<div class="text-end"><h6>Status Order ini dicetak pada tanggal <strong>' +
                                    printDate + '</strong> pukul <strong>' + printTime +
                                    '</strong> oleh <strong> Guess Unlogin </strong></h6></div>'
                                ); // Add signature
                        },
                    },
                    {
                        extend: 'copy',
                        text: '<i class="bi bi-copy"></i> Copy',
                        titleAttr: 'Copy Data',
                        className: 'btn btn-primary col m-1',
                        exportOptions: {
                            columns: ':visible',
                            modifier: {
                                page: 'current',
                            },
                        },
                    }
                ],
                createdRow: function(row, data, dataIndex) {
                    $('td:eq(0)', row).html(dataIndex + 1);
                },
            });

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

            setInterval(function() {
                // Memudarkan tabel
                $('#dataUser').fadeTo(500, 0.5, function() {
                    // Me-reload tabel
                    table.ajax.reload(function() {
                        // Setelah selesai me-reload, kembalikan opasitas tabel ke 1 dengan efek fade in
                        $('#dataUser').fadeTo(500, 1);
                    }, false);
                });
            }, 30000);
        });
    </script> --}}
</body>

</html>
