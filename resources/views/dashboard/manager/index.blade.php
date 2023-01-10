@extends('layouts.app')

@section('title', 'Profile Manager')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manager</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="col-span-12 mt-8">
        <div class="intro-y box m-4 p-4">
            <div class="flex flex-col sm:flex-row items-center pb-2 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Change Email
                </h2>
            </div>
            @error('email')
                <div class="alert alert-danger my-4">
                    Format Email Salah!
                </div>
            @enderror
            @if (session('success-email'))
                <div class="alert alert-success my-4">
                    {{ session('success-email') }}
                </div>
            @endif
            <form action="{{ route('manager.email') }}" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Email</label>
                    <div class="input-group">
                        <input id="crud-form-4" type="email" name="email" class="form-control"
                            placeholder="{{ $manager->email }}" aria-describedby="input-group-2">
                    </div>
                </div>
                <button type="submit">
                    <div class="btn btn-primary w-32 mt-4 mr-1 mb-2">
                        Change Email
                    </div>
                </button>
            </form>
        </div>
        <div class="intro-x box m-4 p-4">
            <div class="flex flex-col sm:flex-row items-center pb-2 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Change Password
                </h2>
            </div>
            @if (session('error'))
                <div class="alert alert-danger my-4">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success my-4">
                    {{ session('success') }}
                </div>
            @endif
            @error('password')
                <div class="alert alert-danger my-4">
                    Password Baru tidak sesuai
                </div>
            @enderror
            <form action="{{ route('manager.password') }}" method="POST">
                @csrf
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Current Password</label>
                    <div class="input-group">
                        <input id="crud-form-4" type="password" name="old_password" class="form-control"
                            aria-describedby="input-group-2">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">New Password</label>
                    <div class="input-group">
                        <input id="crud-form-4" type="password" name="password" class="form-control"
                            aria-describedby="input-group-2">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <input id="crud-form-4" type="password" name="password_confirmation" class="form-control"
                            aria-describedby="input-group-2">
                    </div>
                </div>
                <button type="submit">
                    <div class="btn btn-primary w-38 mt-4 mr-1 mb-2">
                        Change Password
                    </div>
                </button>
            </form>
        </div>
    </div>
@endsection
