<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Page</title>

    <meta name="description" content="" />

<!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Template customizer & Theme config files -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #5f61e6;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">Survey</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}" style="color: white;">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Survey Form -->
    <div class="container mt-5">
        <h2 class="text-center">Survei Kepuasan Pengguna</h2>
        <p class="text-center">Kami menghargai umpan balik Anda untuk membantu kami meningkatkan aplikasi kami.</p>
        <form action="{{ route('welcome.save') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Nama</label>
                <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Enter your name">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin :</label>
                <div class="form-check form-check-inline me-3">
                    <input type="radio" class="form-check-input shadow-sm" id="l" name="jk" value="L">
                    <label for="l" class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input shadow-sm" id="p" name="jk" value="P">
                    <label for="p" class="form-check-label">Perempuan</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-check-label">Pekerjaan :</label>
                <div class="form-check">
                    <input type="radio" name="pekerjaan" id="pekerjaan1" class="form-check-input shadow-sm">
                    <label class="form-check-label" for="pekerjaan1">Pekerjaan 1</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="pekerjaan" id="pekerjaan2" class="form-check-input shadow-sm">
                    <label class="form-check-label" for="pekerjaan2">Pekerjaan 2</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="pekerjaan" id="pekerjaan3" class="form-check-input shadow-sm">
                    <label class="form-check-label" for="pekerjaan3">Pekerjaan 3</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="pekerjaan" id="pekerjaan4" class="form-check-input shadow-sm">
                    <label class="form-check-label" for="pekerjaan4">Pekerjaan 4</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="pekerjaan" id="pekerjaan5" class="form-check-input shadow-sm">
                    <label class="form-check-label" for="pekerjaan5">Pekerjaan 5</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="pekerjaan" id="pekerjaan6" class="form-check-input shadow-sm">
                    <label class="form-check-label" for="pekerjaan6">Pekerjaan 6</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-check-lable">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="5" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <lable class="from-check-lable">Sudah berapa lama anda menggunakan aplikasi Sentuh Tanahku?</lable>
                <br>
                <div class="form-check form-check-inline me-3">
                    <input type="radio" class="form-check-input shadow-sm" id="tahun1" name="tahun" value="1">
                    <label for="tahun1" class="form-check-label">1 Tahun</label>
                </div>
                <div class="form-check form-check-inline me-3">
                    <input type="radio" class="form-check-input shadow-sm" id="tahun2" name="tahun" value="2">
                    <label for="tahun2" class="form-check-label">2 Tahun</label>
                </div>
                <div class="form-check form-check-inline me-3">
                    <input type="radio" class="form-check-input shadow-sm" id="tahun3" name="tahun" value="3-4">
                    <label for="tahun3" class="form-check-label">3-4 Tahun</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input shadow-sm" id="tahun4" name="tahun" value="5">
                    <label for="tahun4" class="form-check-label">5 Tahun</label>
                </div>
            </div>

            <div class="mb-3">
                <table class="table table-borderd bg-white shadow-sm">
                            <tbody>
                                <tr>
                                    <th scope="row"> </th>
                                    <td class="text-center">Sangat Puas</td>
                                    <td class="text-center">Puas</td>
                                    <td class="text-center">Cukup Puas</td>
                                    <td class="text-center">Kurang Puas</td>
                                    <td class="text-center">Tidak Puas</td>
                                </tr>
                                <form action="{{ route('welcome.save') }}" method="post">
                                    <tr>
                                        <th scope="row">Apakah anda merasa puas saat menggunakan aplikasi Sentuh Tanahku?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>Content</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku memberikan informasi yang lengkap</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku memiliki content (isi) yang berkualitas</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku menyediakan content yang bermanfaat</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>Accuracy</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku menyediakan informasi yang akurat</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku bekerja sesuai dengan standar yang ditentukan</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku menghasilkan informasi yang dapat dipercaya</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>Format</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku memiliki format yang menarik</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku memiliki tampilan sistem yang jelas</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fitur-fitur aplikasi Sentuh Tanahku memiliki output dengan kualitas yamg baik</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fitur-fitur aplikasi Sentuh Tanahku memiliki format yang mudah digunakan</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>Ease of use</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku bersifat User Friendly (mudah digunakan)</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku nyaman digunakan</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fitur-fitur aplikasi Sentuh Tanahku memberikan kemudahan beriteraksi dengan penggunanya</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>Timeliness</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku memberikan informasi yang saya butuhkan secara tepat waktu</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku menyediakan informasi yang sudah siap untuk digunakan dalam waktu tertentu</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>System Spedd</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku dapat diakses secara cepat</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku dapat bekerja dengan cepat saat diberikan perintah hingga menghasilkan informasi</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku bekerja dengan cepat saat melakukan penguggahan (upload) atau penggunduhan (dowload) data</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>Security</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Saya dapat mengakses aplikasi Sentuh Tanahku secara aman</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku memiliki pengaturan keamanan</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Data yang ada pada aplikasi Sentuh Tanahku dapat terjamin kerahasiannya</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="8"><b>End User Satisfaction</b></th>
                                    </tr>

                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku sudah dapat memenuhi kebutuhan pengguna</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku sudah bekerja secara efisien</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Aplikasi Sentuh Tanahku sudah efektif dalam penggunaannya</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Saya merasa puas dengan cara kerja sistem secara meyeluruh</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="5"></td>
                                    </tr>
                                </form>
                            </tbody>
                </table>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary shadow">Submit Feedback</button>
            </div>
        </form>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <!-- Your Content Here -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @include('sweetalert::alert')
  </body>
</html>
