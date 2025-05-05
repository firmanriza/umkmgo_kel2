<!-- resources/views/admin/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Pengguna</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                            @csrf
                            @method('POST')
                            <select name="role" required>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="mentor" {{ $user->role == 'mentor' ? 'selected' : '' }}>Mentor</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit">Perbarui Peran</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
