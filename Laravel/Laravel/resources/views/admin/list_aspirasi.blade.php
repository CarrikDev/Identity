@extends('adminlte::page')

@section('title', 'List Aspirasi')

@section('content_header')
    <h2 class="font-weight-bold">
        Daftar Aspirasi / Pengaduan Siswa
    </h2>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Data Pengaduan Masuk</h3>
        </div>

        <div class="card-body">

            <!-- ACTION BUTTONS -->
            <div class="d-flex justify-content-between align-items-center mb-3 d-print-none">
                <div>
                    <span class="badge badge-info py-2 px-3">
                        Total Data: <strong>{{ $complaints->count() }}</strong>
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

            <table id="tabel-aspirasi" class="table table-bordered table-striped w-100">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $no => $c)
                        <tr>
                            <td class="text-center">{{ $no + 1 }}</td>
                            <td>{{ $c->user->name }}</td>
                            <td>{{ $c->category->nama_kategori }}</td>
                            <td>{{ $c->title }}</td>
                            <td class="text-center">
                                <span
                                    class="badge
                        @if ($c->status == 'baru') badge-danger
                        @elseif($c->status == 'diproses') badge-warning
                        @else badge-success @endif">
                                    {{ strtoupper($c->status) }}
                                </span>
                            </td>
                            <td class="text-center">{{ $c->created_at->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('aspirasi.detail', $c->id) }}" class="btn btn-info btn-sm">Detail</a>

                                @if ($c->status != 'selesai')
                                    <button class="btn btn-danger btn-sm btn-reject" data-id="{{ $c->id }}">
                                        Reject
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<style>
.dt-buttons {
    display: none !important;
}
</style>
@stop

@section('js')
<!-- PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<!-- JSZip (Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Buttons HTML5 -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let table;

$(document).ready(function () {

    table = $('#tabel-aspirasi').DataTable({
        pageLength: 10,
        lengthMenu: [
            [10, 30, 50, 100, -1],
            [10, 30, 50, 100, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Laporan Aspirasi',
                filename: 'Laporan-Aspirasi-{{ date("Ymd") }}',
                exportOptions: {
                    columns: ':not(:last-child)',
                    modifier: { page: 'all' }
                }
            }
        ]
    });

    // Trigger Excel
    $('#btnExcel').click(function () {
        table.button('.buttons-excel').trigger();
    });

    // Reject handler
    $('.btn-reject').click(function () {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Yakin ingin reject?',
            text: 'Aduan akan diselesaikan otomatis',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Reject',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-reject-' + id).submit();
            }
        });
    });
});

// PDF: SEMUA DATA
function generatePDF() {
    const currentPage = table.page();
    const currentLength = table.page.len();

    table.page.len(-1).draw();

    setTimeout(() => {
        const element = document.getElementById('tabel-aspirasi');

        html2pdf().set({
            margin: 10,
            filename: 'Laporan-Aspirasi-{{ date("Ymd") }}.pdf',
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        }).from(element).save().then(() => {
            table.page.len(currentLength).draw();
            table.page(currentPage).draw('page');
        });
    }, 300);
}
</script>

@foreach($complaints as $c)
<form id="form-reject-{{ $c->id }}"
      action="{{ route('aspirasi.reject', $c->id) }}"
      method="POST" class="d-none">
    @csrf
</form>
@endforeach
@stop
