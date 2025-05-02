@extends('layouts.app')

@section('content')
<style>
    .user-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .user-card {
        border-radius: 16px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 20px;
        text-align: center;
        transition: 0.3s;
    }

    .user-card:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .user-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1E293B;
        margin-bottom: 6px;
    }

    .user-email {
        font-size: 0.9rem;
        color: #64748B;
        margin-bottom: 15px;
    }

    .user-role-select {
        border-radius: 8px;
        padding: 8px;
        font-size: 0.9rem;
    }

    .alert-success {
        margin-top: 20px;
        border-radius: 8px;
    }
</style>

<div class="container">
    <h2 class="mb-4">Manajemen Pengguna</h2>

    <div class="user-grid">
        @foreach($users as $user)
        <div class="user-card">
            <div class="user-name">{{ $user->name }}</div>
            <div class="user-email">{{ $user->email }}</div>

            <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                @csrf
                <select name="role" class="form-select user-role-select" onchange="this.form.submit()">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="mentor" {{ $user->role == 'mentor' ? 'selected' : '' }}>Mentor</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </form>
        </div>
        @endforeach
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
