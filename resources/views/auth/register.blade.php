@extends('layouts.app')
@section('konten')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 mt-5">
            <div class="card-body p-4">
                <h4 class="fw-bold text-center text-primary mb-4">Daftar Akun Dosen</h4>
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    <small>Sudah punya akun? <a href="/login">Login di sini</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection