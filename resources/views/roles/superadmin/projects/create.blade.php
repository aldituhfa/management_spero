@extends('layouts.superadmin')

@section('content')
<div class="container mt-4">
    <h3 class="fw-bold mb-3">Create Project</h3>

    <a href="{{ route('roles.superadmin.projects') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card p-4">
        <form>
            <div class="row mb-3">
                <div class="col">
                    <label>Customer Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col">
                    <label>Email Address</label>
                    <input type="email" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label>Company Identity</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label>Sales Person</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label>Company Name</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select class="form-control">
                    <option>Pending</option>
                    <option>In Progress</option>
                    <option>Done</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Waktu Pengerjaan</label>
                <input type="text" class="form-control">
            </div>

            <button class="btn btn-primary">Submit (Dummy)</button>
        </form>
    </div>
</div>
@endsection
