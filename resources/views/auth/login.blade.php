@extends('layouts.app')
@section('konten')
<div class="row justify-content-center">
    <div class="col-md-5">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm border-0 mt-5">
            <div class="card-body p-4">
                <h4 class="fw-bold text-center text-primary mb-4">Masuk ke EduQuest</h4>
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>
                </form>
                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="/register">Daftar Dosen</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection