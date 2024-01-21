@extends('layouts.app')

@section('contents')
    <h2 class="mb-0">Detail Siswa</h2>
    <hr />

    <div class="row mb-3">
        
        <div class="col-12 mb-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $siswa->nama }}">
        </div>
        
        

        <div class="col-12 mb-4">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" readonly value="{{ $siswa->alamat }}">
        </div>

        <div class="col-12 mb-4">
            <label for="wali" class="form-label">Wali</label>
            <input type="text" id="wali" name="wali" class="form-control" readonly value="{{ $siswa->wali }}">
        </div>

        <div class="col-12 mb-4">
            <label for="ket" class="form-label">Keterangan</label>
            <input type="text" id="ket" name="ket" class="form-control" readonly value="{{ $siswa->ket }}">
        </div>

        <div class="col-12 mb-4">
            <label for="created_by" class="form-label">Created By Name</label>
            <input type="text" id="created_by" name="created_by" class="form-control" readonly value="{{ $siswa->created_by_name }}">
        </div>

    </div> 
@endsection