@extends('panel.layouts.app')

@section('title')
    Pengaturan Akun
@endsection

@section('content')
    <style>
        .login_oueter {
            width: 360px;
            max-width: 100%;
        }

        .logo_outer {
            text-align: center;
        }

        .logo_outer img {
            width: 120px;
            margin-bottom: 40px;
        }
    </style>

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
                <form action="{{ route('setting-account.update', encrypt($user['id'])) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row gy-2">
                        <div class="col-md-4 col-sm-2">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user['name'] }}" placeholder="Masukkan Username">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-2">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $user['username'] }}" placeholder="Masukkan Username">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user['email'] }}" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-2">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="alamat" class="form-control" id="alamat" name="alamat"
                                    value="{{ $user['alamat'] }}" placeholder="Masukkan Alamat">
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select select2"
                                data-placeholder="Pilih Jenis Kelamin">
                                <option selected value="{{ $user['jenis_kelamin'] }}"> {{ $user['jenis_kelamin'] }}
                                </option>
                                <option value="1">Laki Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-2">
                            <label for="username">Password Baru</label>
                            <div class="input-group">
                                <input name="password" type="password" class="input form-control" id="password"
                                    aria-label="password" aria-describedby="basic-addon1" autocomplete="new-password"
                                    placeholder="Masukkan Password Baru" />
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="bi bi-eye-fill" id="show_eye"></i>
                                        <i class="bi bi-eye-slash-fill d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm2">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Masukan Bio">{{ $user['bio'] }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // select 2 inii
            $('#jenis_kelamin').select2({ // select 2 initialization
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });
        });

        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
@endsection
