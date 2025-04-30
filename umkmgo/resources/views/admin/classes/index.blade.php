@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Kelas</h1>

    <a href="{{ route('admin.classes.create') }}" class="btn btn-primary mb-3">Tambah Kelas Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori UMKM</th>
                <th>Bidang</th>
                <th>Level</th>
                <th>Metode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ ucfirst($class->field) }}</td>
                <td>{{ ucfirst($class->level) }}</td>
                <td>{{ ucfirst($class->type) }}</td>
                <td>
                    <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kelas ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
