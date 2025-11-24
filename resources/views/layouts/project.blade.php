<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project - {{ $title ?? '' }}</title>

    <style>
        body { margin:0; font-family:Arial; background:#f4f4f4; }
        .sidebar { width:240px; background:#0f172a; color:white; position:fixed; top:0; bottom:0; left:0; padding-top:20px; }
        .sidebar a { color:#cbd5e1; padding:12px 20px; display:block; text-decoration:none; }
        .sidebar a:hover, .active { background:#1e293b; color:white; }
        .content { margin-left:240px; padding:25px; }
    </style>
</head>
<body>

    <div class="sidebar">

        <h2 style="text-align:center;">PROJECT</h2>

        <a href="{{ route('roles.project.dashboard') }}" class="{{ request()->routeIs('roles.project.dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <form action="{{ route('logout') }}" method="POST" style="padding:20px;">
            @csrf
            <button style="width:100%; padding:10px; background:#ef4444; color:#fff; border:none;">Logout</button>
        </form>

    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
