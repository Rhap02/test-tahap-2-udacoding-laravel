@extends('layouts.app')

@section('title', 'Create Siswa')

@section('contents')
    <h1 class="mb-0">Add Siswa</h1>
    <hr />
    <form action="{{ route('siswas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}">
            </div>
        
            <div class="col-12 mb-4">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}">
            </div>

            <div class="col-12 mb-4">
                <label for="wali" class="form-label">Wali</label>
                <input type="text" id="wali" name="wali" class="form-control" placeholder="Wali" value="{{ old('wali') }}">
            </div>

            <div class="col-12 mb-4">
                <label for="ket" class="form-label">Keterangan</label>
                <input type="text" id="ket" name="ket" class="form-control" placeholder="Ket" value="{{ old('ket') }}">
            </div>


        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection