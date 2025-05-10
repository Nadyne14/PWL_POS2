@extends('layouts.template')

@section('content')
<div class="modal-header">
    <h5 class="modal-title">Tambah User (Ajax)</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="formTambahUserAjax" method="POST" action="{{ route('user.store_ajax') }}">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required minlength="3">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="level_id">Level</label>
            <select class="form-control" id="level_id" name="level_id" required>    
                <option value="">Pilih Level</option>
                @foreach($levels as $item)
                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required minlength="6">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@push('js')
<script>
$(document).ready(function() {
    $('#formTambahUserAjax').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if(response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#myModal').modal('hide');
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message
                    });
                }
            },
            error: function(xhr) {
                var errorMsg = 'Terjadi kesalahan saat menyimpan data.';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMsg
                });
            }
        });
    });
});
</script>
@endpush
@endsection