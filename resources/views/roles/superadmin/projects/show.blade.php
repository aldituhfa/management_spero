@extends('layouts.superadmin')

@section('content')
@php
// Dummy project detail
$project = [
    1 => [
        'customer_name' => 'Andi Wijaya',
        'email' => 'andi@sakura.com',
        'company_identity' => 'NPWP-0988776',
        'sales_person' => 'Budi Santoso',
        'phone' => '081234567890',
        'company_name' => 'PT Sakura Tech',
        'status' => 'In Progress',
        'waktu_pengerjaan' => '30 Hari',
        'created_date' => '2025-11-15'
    ],
    2 => [
        'customer_name' => 'Nurul Hasan',
        'email' => 'nurul@mega.com',
        'company_identity' => 'NPWP-112233',
        'sales_person' => 'Rio Fernando',
        'phone' => '082233445566',
        'company_name' => 'CV Mega Logam',
        'status' => 'Pending',
        'waktu_pengerjaan' => '45 Hari',
        'created_date' => '2025-11-10'
    ]
];
$data = $project[$id];
@endphp

<div class="container mt-4">
    <h3 class="fw-bold mb-3">Project Detail</h3>

    <a href="{{ route('roles.superadmin.projects') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card p-3">
        <p><strong>Customer Name:</strong> {{ $data['customer_name'] }}</p>
        <p><strong>Email Address:</strong> {{ $data['email'] }}</p>
        <p><strong>Company Identity:</strong> {{ $data['company_identity'] }}</p>
        <p><strong>Sales Person:</strong> {{ $data['sales_person'] }}</p>
        <p><strong>Phone Number:</strong> {{ $data['phone'] }}</p>
        <p><strong>Company Name:</strong> {{ $data['company_name'] }}</p>
        <p><strong>Status:</strong> {{ $data['status'] }}</p>
        <p><strong>Waktu Pengerjaan:</strong> {{ $data['waktu_pengerjaan'] }}</p>
        <p><strong>Create Date:</strong> {{ $data['created_date'] }}</p>
    </div>
</div>
@endsection
