<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Super Admin - {{ $title ?? '' }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        :root {
            --tblr-primary: #206bc4;
            --tblr-border-color: #e6e7e9;
            --tblr-sidebar-width: 240px;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f5f7fb;
            overflow-x: hidden;
            font-size: 0.875rem;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: var(--tblr-sidebar-width);
            background-color: #fff;
            border-right: 1px solid var(--tblr-border-color);
            position: fixed;
            height: 100vh;
            z-index: 1000;
            overflow-y: auto;
            left: 0;
            top: 0;
        }

        .sidebar .nav-link {
            color: #576176;
            padding: 0.5rem 0.75rem;
            border-radius: 4px;
            margin-bottom: 0.125rem;
            display: flex;
            align-items: center;
            font-size: 0.8125rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(32, 107, 196, 0.08);
            color: var(--tblr-primary);
        }

        .sidebar .nav-link i {
            margin-right: 0.5rem;
            font-size: 1rem;
            width: 16px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-header {
            padding: 1rem 0.75rem;
            border-bottom: 1px solid var(--tblr-border-color);
            background: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: inherit;
            width: 100%;
            cursor: default;
        }

        .logo-img {
            width: 64px;
            height: 64px;
            object-fit: contain;
            border-radius: 6px;
        }

        .school-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: #1a1a1a;
            text-align: center;
            line-height: 1.3;
        }

        .logo-fallback {
            width: 64px;
            height: 64px;
            border-radius: 6px;
            background-color: var(--tblr-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .main-content {
            margin-left: var(--tblr-sidebar-width);
            min-height: 100vh;
            background-color: #f5f7fb;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid var(--tblr-border-color);
            padding: 0.5rem 1rem;
            height: 50px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .page-wrapper {
            padding: 1rem;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--tblr-primary);
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
            flex-shrink: 0;
            overflow: hidden;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-dropdown .dropdown-toggle::after {
            display: none;
        }

        .user-dropdown .dropdown-menu {
            border: 1px solid var(--tblr-border-color);
            font-size: 0.8125rem;
            min-width: 150px;
        }

        .page-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .page-subtitle {
            font-size: 0.8125rem;
            color: #6c757d;
        }

        .sidebar-content {
            padding: 0.5rem 0;
        }

        .sidebar .nav {
            gap: 0.125rem;
        }

        .nav-item {
            margin: 0;
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
            font-size: 1.25rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: calc(-1 * var(--tblr-sidebar-width));
                transition: margin-left 0.3s ease;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .navbar {
                position: relative;
            }

            .logo-img {
                width: 56px;
                height: 56px;
            }

            .logo-fallback {
                width: 56px;
                height: 56px;
            }

            .school-name {
                font-size: 0.8125rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <img src="{{ asset('images/Spero Logo.jpg') }}" alt="Logo Spero" class="logo-img">

            </div>
        </div>

        <div class="sidebar-content">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('roles.superadmin.dashboard') ? 'active' : '' }}"
                        href="{{ route('roles.superadmin.dashboard') }}">
                        <i class="ti ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('roles.superadmin.users') ? 'active' : '' }}"
                        href="{{ route('roles.superadmin.users') }}">
                        <i class="ti ti-users"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
<<<<<<< Updated upstream
                
=======

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('roles.superadmin.projects') ? 'active' : '' }}"
                        href="{{ route('roles.superadmin.projects') }}">
                        <i class="ti ti-folder"></i>
                        <span>Manage Projects</span>
                    </a>
                </li>
>>>>>>> Stashed changes
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler d-lg-none" type="button" id="sidebarToggle">
                    <i class="ti ti-menu-2"></i>
                </button>

                <div class="d-none d-md-flex align-items-center me-auto">
                    <h2 class="page-title mb-0">{{ $title ?? '' }}</h2>
                </div>

                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown user-dropdown">
                        <a href="#" class="nav-link d-flex align-items-center p-0" data-bs-toggle="dropdown">
                            <div class="avatar me-2">
                                @if(Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                    alt="Profile"
                                    class="avatar-img">
                                @else
                                {{ strtoupper(substr(Auth::user()->name ?? 'SA', 0, 2)) }}
                                @endif
                            </div>
                            <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Super Admin' }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#" style="font-size: 0.8125rem;">
                                <i class="ti ti-user me-2"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger" style="font-size: 0.8125rem;">
                                    <i class="ti ti-logout me-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Auto aktif menu berdasarkan URL
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>