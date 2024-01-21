@extends('layouts.app')

@section('contents')
    <h1 class="mb-0">Edit Siswa</h1>
    <hr />
    <form action="{{ route('siswas.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="row mb-3">
            <div class="col-12 mb-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ $siswa->nama }}">
            </div>

            <div class="col-12 mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ $siswa->alamat }}">
            </div>
        </div> 

        <div class="col-12 mb-4">
            <label for="wali" class="form-label">Wali</label>
            <input type="text" id="wali" name="wali" class="form-control" placeholder="Wali" value="{{ $siswa->wali }}">
        </div>

        <div class="col-12 mb-4">
            <label for="ket" class="form-label">Keterangan</label>
            <input type="text" id="ket" name="ket" class="form-control" placeholder="ket" value="{{ $siswa->ket }}">
        </div>

    </div> 

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection