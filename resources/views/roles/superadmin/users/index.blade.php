@extends('layouts.superadmin')

@section('content')
<h2 class="mb-4">Manage Users</h2>

{{-- Alert sukses --}}
@if(session('success'))
    <div style="background:#d1fae5; padding:10px; border-radius:5px; margin-bottom:15px;">
        {{ session('success') }}
    </div>
@endif

{{-- Form Tambah Pengguna --}}
<div style="
    background:white; 
    padding:20px; 
    border-radius:8px; 
    margin-bottom:20px; 
    box-shadow:0 2px 5px rgba(0,0,0,0.1);
    max-width: 500px;
">
    <h3 style="margin-bottom:15px;">Buat Akun Role Baru</h3>

    <form action="{{ url('/roles/superadmin/users') }}" method="POST">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" style="width:100%; padding:10px;" required>

        <label style="margin-top:10px;">Email</label>
        <input type="email" name="email" style="width:100%; padding:10px;" required>

        <label style="margin-top:10px;">Role</label>
        <select name="role" style="width:100%; padding:10px;" required>
            <option value="">-- Pilih Role --</option>
            <option value="sales">Sales</option>
            <option value="project">Project</option>
            <option value="finance">Finance</option>
        </select>

        <label style="margin-top:10px;">Password</label>
        <input type="password" name="password" style="width:100%; padding:10px;" required>

        <button type="submit" style="
            margin-top:15px; 
            background:#1e293b; 
            color:white; 
            padding:10px 20px; 
            border:none; 
            border-radius:5px;
            cursor:pointer;
        ">
            Simpan
        </button>
    </form>
</div>

{{-- Tabel daftar user --}}
<div style="background:white; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">
    <h3 style="margin-bottom:15px;">Daftar User Role Lain</h3>

    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#f1f5f9;">
                <th style="padding:10px; border-bottom:1px solid #e2e8f0;">Nama</th>
                <th style="padding:10px; border-bottom:1px solid #e2e8f0;">Email</th>
                <th style="padding:10px; border-bottom:1px solid #e2e8f0;">Role</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="padding:10px; border-bottom:1px solid #e2e8f0;">{{ $user->name }}</td>
                    <td style="padding:10px; border-bottom:1px solid #e2e8f0;">{{ $user->email }}</td>
                    <td style="padding:10px; border-bottom:1px solid #e2e8f0;">{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
