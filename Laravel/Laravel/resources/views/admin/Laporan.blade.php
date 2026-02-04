@extends('adminlte::page')

@section('title', 'Laporan Kategori')

@section('content_header')
<div class="text-center mb-4">
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-file-alt mr-2"></i>
        Laporan Data Kategori
    </h2>
    <p class="text-muted">Sistem Informasi Manajemen</p>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- AREA DOWNLOAD -->
            <div id="area-laporan">
                <div class="card shadow-lg border-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Kategori</h5>
                        <div class="d-none d-print-block">
                            <small>Dicetak pada: {{ now()->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- ACTION BUTTONS (Hidden when Printing) -->
                        <div class="d-flex justify-content-between align-items-center mb-4 d-print-none">
                            <div>
                                <span class="badge badge-info py-2 px-3">
                                    Total Data: <strong>{{ $kategoris->count() }}</strong>
                                </span>
                            </div>
                            <div class="btn-group shadow-sm">
                                <button onclick="window.print()" class="btn btn-outline-secondary">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                                <button onclick="generatePDF()" class="btn btn-outline-danger">
                                    <i class="fas fa-file-pdf"></i> PDF
                                </button>
                                <button id="btnExcel" class="btn btn-outline-success">
                                    <i class="fas fa-file-excel"></i> Excel
                                </button>
                            </div>
                        </div>

                        <!-- TABLE -->
                        <div class="table-responsive">
                            <table id="tabel-kategori" class="table table-bordered table-striped align-middle w-100">
                                <thead class="bg-primary text-white text-center">
                                    <tr>
                                        <th width="60">No</th>
                                        <th>Nama Kategori</th>
                                        <th width="180">Tanggal Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategoris as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td class="text-center">{{ $item->created_at->format('d M Y') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Data belum tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="text-center text-muted mt-4 mb-5">
                <small>© {{ date('Y') }} <strong>Laporan Sistem</strong> - All Rights Reserved</small>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<style>
    .card-header {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%) !important;
        color: white;
    }
    /* Sembunyikan tombol bawaan DataTables */
    .dt-buttons {
        display: none !important;
    }
</style>
@stop

@section('js')
<!-- PDF (JANGAN DIUBAH) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- jQuery (WAJIB sebelum DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CORE -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<!-- DataTables BUTTONS -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<!-- JSZip (WAJIB untuk Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Buttons HTML5 (EXCEL ENGINE) -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
let table;

$(document).ready(function () {

    if ($.fn.DataTable.isDataTable('#tabel-kategori')) {
        $('#tabel-kategori').DataTable().destroy();
    }

    table = $('#tabel-kategori').DataTable({
        paging: true,
        pageLength: 10,
        lengthMenu: [
            [10, 30, 50, 100, -1],
            [10, 30, 50, 100, "All"]
        ],
        info: true,
        searching: true,
        ordering: true,
        dom: 'lBfrtip', // l = length dropdown
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Laporan Data Kategori',
                filename: 'Laporan-Kategori-{{ date("Ymd") }}',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all' // 🔥 EXPORT SEMUA DATA
                    }
                }
            }
        ]
    });

    $('#btnExcel').on('click', function () {
        table.button('.buttons-excel').trigger();
    });
});

function generatePDF() {
    // Simpan state pagination
    const currentPage = table.page();
    const currentLength = table.page.len();

    // Tampilkan semua data
    table.page.len(-1).draw();

    setTimeout(() => {
        const element = document.getElementById('area-laporan');

        const opt = {
            margin: [10, 10],
            filename: 'Laporan-Kategori-{{ date("Ymd") }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save().then(() => {
            // Kembalikan pagination ke kondisi awal
            table.page.len(currentLength).draw();
            table.page(currentPage).draw('page');
        });
    }, 300);
}
</script>
@stop
