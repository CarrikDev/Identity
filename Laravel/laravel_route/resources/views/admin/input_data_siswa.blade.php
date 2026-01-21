@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <form action="/siswa" method="post" id="multi-siswa-form" novalidate>
                @csrf
                
                <div id="siswa-container">
                    <div class="siswa-card-entry">
                        {{-- Hapus atribut 'removable' bawaan AdminLTE di sini --}}
                        <x-adminlte-card title="Data Siswa #1" theme="cyan" theme-mode="outline" collapsible>
                            <x-adminlte-input name="nama[]" placeholder="Masukkan Nama Siswa" label="Nama" required />
                            <x-adminlte-input name="nis[]" type="number" placeholder="Masukkan NIS Siswa" label="NIS" required />
                            <x-adminlte-input name="kelas[]" placeholder="Masukkan Kelas Siswa" label="Kelas" required />
                            <x-adminlte-select name="jurusan_id[]" label="Jurusan" required>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                </x-slot>
                                <option value="" selected disabled>-- Pilih Jurusan --</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </x-adminlte-select>
                            {{-- Tambahkan slot tools untuk tombol close kustom --}}
                            <x-slot name="toolsSlot">
                                <button type="button" class="btn btn-tool remove-card-btn" title="Hapus Data Ini">
                                    <i class="fas fa-times"></i>
                                </button>
                            </x-slot>
                        </x-adminlte-card>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Floating Action Buttons (FAB) and CSS fixes --}}
<style>
    .fab-container {
        position: fixed;
        bottom: 60px; right: 20px; z-index: 1000;
        display: flex; flex-direction: column; gap: 10px;
    }
    .btn-fab {
        width: 56px; height: 56px; border-radius: 50%; padding: 0;
        display: flex; justify-content: center; align-items: center;
    }
    .btn-fab-lg { width: 64px; height: 64px; }
    .is-invalid { border-color: #dc3545 !important; }
</style>

<div class="fab-container">
    <button type="button" class="btn btn-success shadow-lg btn-fab btn-fab-lg" id="add-card-btn" title="Tambah Data Lain">
        <i class="fas fa-plus"></i>
    </button>
    <button type="button" class="btn btn-primary shadow-lg btn-fab btn-fab-lg" id="submit-all-btn" title="Submit Semua Data">
        <i class="fas fa-sign-in-alt"></i>
    </button>
</div>


@push('js')
<script>
    $(document).ready(function() {
        var originalCardTemplate = $('.siswa-card-entry:first').clone();

        function reIndexCards() {
            $('.siswa-card-entry').each(function(index) {
                $(this).find('.card-title').text('Data Siswa #' + (index + 1));
            });
        }

        $('#add-card-btn').click(function() {
            var newCard = originalCardTemplate.clone();
            newCard.find('input').val('').removeClass('is-invalid');
            newCard.find('select').val('').removeClass('is-invalid');
            newCard.find('select option[selected]').removeAttr('selected');
            newCard.find('select option[value=""]:first').attr('selected', true);
            
            $('#siswa-container').append(newCard);
            reIndexCards();
        });

        // Event listener untuk tombol close kustom (remove-card-btn)
        $('#siswa-container').on('click', '.remove-card-btn', function() {
            if ($('.siswa-card-entry').length <= 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Minimal 1 Data',
                    text: 'Minimal harus ada 1 data siswa yang diinput.',
                });
            } else {
                $(this).closest('.siswa-card-entry').remove();
                reIndexCards();
            }
        });

        // --- Validasi Kustom dengan SweetAlert ---
        $('#submit-all-btn').click(function(e) {
            let isValid = true;
            let firstInvalidField = null;

            $('.siswa-card-entry').each(function() {
                $(this).find('[required]').each(function() {
                    if (!this.checkValidity()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        if (!firstInvalidField) firstInvalidField = $(this);
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });
            });

            if (isValid) {
                $('#multi-siswa-form').submit();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    text: 'Mohon lengkapi semua data yang diperlukan.',
                });
                firstInvalidField.focus();
            }
        });
    });
</script>
@endpush

@endsection
