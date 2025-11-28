@extends('layouts.superadmin')

@section('content')
@php
$projects = [
    [
        'id' => 1,
        'client_name' => 'PT Sakura Tech',
        'target_timeline' => '2025-12-20',
        'created_date' => '2025-11-15',
        'company' => 'Sakura Corporation',
        'progress' => '70%',
        'status' => 'In Progress'
    ],
    [
        'id' => 2,
        'client_name' => 'CV Mega Logam',
        'target_timeline' => '2026-01-10',
        'created_date' => '2025-11-10',
        'company' => 'Mega Group',
        'progress' => '40%',
        'status' => 'Pending'
    ],
];
@endphp

<div class="container mt-4">
    <h3 class="fw-bold mb-3">Project List</h3>

    <a href="{{ route('roles.superadmin.projects.create') }}" class="btn btn-primary mb-3">
        + Create Project
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Client Name</th>
                <th>Target Timeline</th>
                <th>Created Date</th>
                <th>Company</th>
                <th>Progress</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($projects as $key => $p)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $p['client_name'] }}</td>
                <td>{{ $p['target_timeline'] }}</td>
                <td>{{ $p['created_date'] }}</td>
                <td>{{ $p['company'] }}</td>
                <td>{{ $p['progress'] }}</td>
                <td>{{ $p['status'] }}</td>
                <td>
                    <a href="{{ route('roles.superadmin.projects.show', $p['id']) }}"
                        class="btn btn-sm btn-info">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
