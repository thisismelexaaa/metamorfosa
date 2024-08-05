@extends('panel.layouts.app')

@section('title')
    Pengaturan Akun
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Pengaturan Akun') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Pengaturan Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-2">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user['name'] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-2">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ Str::limit($user['password'], 10) }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                        Show
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePasswordButton = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');

            togglePasswordButton.addEventListener('click', function() {
                // Toggle the input type between password and text
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;

                // Toggle button text
                this.textContent = type === 'password' ? 'Show' : 'Hide';
            });
        });
    </script>
@endsection
