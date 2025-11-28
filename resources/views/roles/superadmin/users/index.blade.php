@extends('layouts.superadmin')

@section('content')

<h2 class="mb-4" style="font-weight:700;">Manage Users</h2>

{{-- ALERT SUKSES --}}
@if(session('success'))
<div style="
    background:#d1fae5;
    padding:12px;
    border-radius:6px;
    border-left:6px solid #059669;
    margin-bottom:20px;
">
    {{ session('success') }}
</div>
@endif


{{-- ============================================================= --}}
{{-- =====================  TABEL USER  =========================== --}}
{{-- ============================================================= --}}
<div style="
    background:white;
    padding:22px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
    margin-bottom:25px;
">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h3 style="margin:0; font-weight:600;">Daftar User Role Lain</h3>

        <button onclick="openCreateModal()" style="
            background:#2563eb;
            color:white;
            padding:10px 18px;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-weight:600;
            box-shadow:0 2px 5px rgba(0,0,0,0.15);
        ">
            + Buat User Baru
        </button>
    </div>

    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                <th style="padding:12px; text-align:left;">Nama</th>
                <th style="padding:12px; text-align:left;">Email</th>
                <th style="padding:12px; text-align:left;">Role</th>
                <th style="padding:12px; text-align:left;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr style="border-bottom:1px solid #e2e8f0;">
                <td style="padding:12px;">{{ $user->name }}</td>
                <td style="padding:12px;">{{ $user->email }}</td>
                <td style="padding:12px; text-transform:capitalize;">{{ $user->role }}</td>

                <td style="padding:12px;">

                    {{-- BUTTON EDIT --}}
                    <button
                        data-id="{{ $user->id }}"
                        data-name="{{ $user->name }}"
                        data-email="{{ $user->email }}"
                        data-role="{{ $user->role }}"
                        onclick="openEditModal(this)"
                        style="
                            background:#334155;
                            color:white;
                            padding:6px 14px;
                            border:none;
                            border-radius:6px;
                            cursor:pointer;
                        ">
                        Edit
                    </button>

                    {{-- BUTTON DELETE --}}
                    <form action="{{ url('/roles/superadmin/users/'.$user->id) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Hapus user ini?')" 
                            style="
                                background:#dc2626;
                                color:white;
                                padding:6px 14px;
                                border:none;
                                border-radius:6px;
                                cursor:pointer;
                                margin-left:6px;
                            ">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{-- ============================================================= --}}
{{-- ================= MODAL CREATE USER ========================== --}}
{{-- ============================================================= --}}
<div id="createModal" style="
    display:none;
    position:fixed; top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.55);
    backdrop-filter: blur(3px);
    justify-content:center; align-items:center;
    z-index:999;
">
    <div style="
        background:white;
        width:420px;
        padding:25px;
        border-radius:12px;
        box-shadow:0 5px 20px rgba(0,0,0,0.2);
        animation: fadeIn .2s ease;
    ">
        <h3 style="margin-bottom:15px; font-weight:600;">Buat User Baru</h3>

        <form action="{{ url('/roles/superadmin/users') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #cbd5e1;">

            <label>Email</label>
            <input type="email" name="email" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #cbd5e1;">

            <label>Role</label>
            <select name="role" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #cbd5e1;">
                <option value="">-- Pilih Role --</option>
                <option value="sales">Sales</option>
                <option value="project">Project</option>
                <option value="finance">Finance</option>
            </select>

            <label>Password</label>
            <input type="password" name="password" required style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #cbd5e1;">


            <div style="display:flex; justify-content:space-between; margin-top:10px;">
                <button type="button" onclick="closeCreateModal()" style="
                    background:#64748b;
                    color:white;
                    padding:10px 18px;
                    border:none;
                    border-radius:6px;
                    cursor:pointer;
                ">Batal</button>

                <button type="submit" style="
                    background:#2563eb;
                    color:white;
                    padding:10px 18px;
                    border:none;
                    border-radius:6px;
                    cursor:pointer;
                    font-weight:600;
                ">Simpan</button>
            </div>

        </form>
    </div>
</div>



{{-- ============================================================= --}}
{{-- ================== MODAL EDIT USER =========================== --}}
{{-- ============================================================= --}}
<div id="editModal" style="
    display:none;
    position:fixed; top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.55);
    backdrop-filter: blur(3px);
    justify-content:center; align-items:center;
    z-index:999;
">
    <div style="
        background:white;
        width:420px;
        padding:25px;
        border-radius:12px;
        box-shadow:0 5px 20px rgba(0,0,0,0.2);
        animation: fadeIn .2s ease;
    ">
        <h3 style="margin-bottom:15px; font-weight:600;">Edit User</h3>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input id="editName" type="text" name="name" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #cbd5e1;">

            <label>Email</label>
            <input id="editEmail" type="email" name="email" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #cbd5e1;">

            <label>Role</label>
            <select id="editRole" name="role" required style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #cbd5e1;">
                <option value="sales">Sales</option>
                <option value="project">Project</option>
                <option value="finance">Finance</option>
            </select>

            <label>Password Baru (optional)</label>
            <input id="editPassword" type="password" name="password" placeholder="Kosongkan jika tidak diganti" style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #cbd5e1;">


            <div style="display:flex; justify-content:space-between;">
                <button type="button" onclick="closeEditModal()" style="
                    background:#64748b;
                    color:white;
                    padding:10px 18px;
                    border:none;
                    border-radius:6px;
                    cursor:pointer;
                ">Batal</button>

                <button type="submit" style="
                    background:#1e293b;
                    color:white;
                    padding:10px 18px;
                    border:none;
                    border-radius:6px;
                    cursor:pointer;
                    font-weight:600;
                ">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>




{{-- ============================================================= --}}
{{-- ====================== JAVASCRIPT ============================ --}}
{{-- ============================================================= --}}
<script>
// === CREATE MODAL ===
function openCreateModal() {
    document.getElementById("createModal").style.display = "flex";
}
function closeCreateModal() {
    document.getElementById("createModal").style.display = "none";
}

// === EDIT MODAL ===
function openEditModal(btn) {
    document.getElementById("editModal").style.display = "flex";

    document.getElementById("editName").value = btn.dataset.name;
    document.getElementById("editEmail").value = btn.dataset.email;
    document.getElementById("editRole").value = btn.dataset.role;

    document.getElementById("editForm").action = "/roles/superadmin/users/" + btn.dataset.id;
}
function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}
</script>

@endsection
