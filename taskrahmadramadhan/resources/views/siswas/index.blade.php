@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h2 class="mb-0">List Siswa</h2>
    <a href="{{ route('siswas.create')}}" class="btn btn-primary">Add</a>
</div>
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success' )}}
</div>
@endif
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Created By</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>NAMA WALI</th>
            <th>KETERANGAN</th>

        </tr>
    </thead>
    <tbody>+
        @if ($siswas->count() >0)
        @foreach ($siswas as $rs)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $rs->created_by_name }}</td>
            <td class="align-middle">{{ $rs->nama }}</td>
            <td class="align-middle">{{ $rs->alamat }}</td>
            <td class="align-middle">{{ $rs->wali }}</td>
            <td class="align-middle">{{ $rs->ket }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('siswas.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                    <a href="{{ route('siswas.edit', $rs->id) }}" type="button" class="btn btn-warning">Edit</a>
                    <form action="{{ route('siswas.destroy', $rs->id) }}" method="POST" type="button"
                        class="btn btn-danger btn-sm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm m-0">Delete</button>
                    </form>

                </div>
            </td>
        </tr>

        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="7">Data not found</td>
        </tr>

        @endif
    </tbody>
</table>

@endsection