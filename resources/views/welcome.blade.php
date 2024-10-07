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

  <body style="background-color: whitesmoke">
    <!-- Content -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #a6c36f;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white;">MyASN BKN</a>
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
    <div class="container d-flex justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Survei Kepuasan Pengguna Aplikasi MyASN BKN</h2>
                <p class="text-center">Kami menghargai umpan balik Anda untuk membantu kami meningkatkan aplikasi kami.</p>
            </div>

            <div class="card-body">
                <form action="{{ route('welcome.save') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Masukan email anda">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Masukan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="text" class="form-control shadow-sm" id="umur" name="umur" placeholder="Masukan umur anda">
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <br>
                        <input type="radio" class="form-check-input shadow-sm" id="jk" name="jk" value="L"> Laki-laki
                        <br>
                        <input type="radio" class="form-check-input shadow-sm" id="jk" name="jk" value="P"> Perempuan
                    </div>
                    <div class="mb-3">
                        <label for="lamaPengunaan">Berapa lama anda telah menggunaan aplikasi MyASN BKN</label>
                    </div>
                    <div class="mb-3">
                        <table class="table table-bordered shadow-sm">
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
                                        <th scope="row">Seberapa puas Anda dengan kecepatan akses aplikasi MyASN BKN?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="access_speed" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="access_speed" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="access_speed" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="access_speed" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="access_speed" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan kualitas dokumentasi atau panduan penggunaan aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="documentation_quality" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="documentation_quality" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="documentation_quality" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="documentation_quality" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="documentation_quality" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan kinerja aplikasi di berbagai perangkat?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="performance_across_devices" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="performance_across_devices" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="performance_across_devices" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="performance_across_devices" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="performance_across_devices" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan keteraturan pembaruan fitur atau perbaikan bug aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_update_frequency" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_update_frequency" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_update_frequency" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_update_frequency" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_update_frequency" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan efisiensi penggunaan memori aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="memory_efficiency" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="memory_efficiency" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="memory_efficiency" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="memory_efficiency" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="memory_efficiency" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan tingkat kenyamanan navigasi dalam aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="navigation_comfort" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="navigation_comfort" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="navigation_comfort" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="navigation_comfort" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="navigation_comfort" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan ketersediaan informasi yang relevan dengan kebutuhan Anda?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_relevance" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_relevance" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_relevance" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_relevance" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_relevance" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan kualitas tampilan grafis dan visual antarmuka?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="visual_quality" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="visual_quality" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="visual_quality" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="visual_quality" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="visual_quality" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa mudah Anda menemukan fitur yang dibutuhkan dalam aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_discoverability" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_discoverability" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_discoverability" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_discoverability" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_discoverability" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa cepat waktu yang dibutuhkan untuk menyelesaikan suatu tugas di aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="task_completion_speed" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="task_completion_speed" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="task_completion_speed" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="task_completion_speed" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="task_completion_speed" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan keandalan aplikasi saat digunakan untuk tugas yang kompleks?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="reliability_complex_tasks" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="reliability_complex_tasks" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="reliability_complex_tasks" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="reliability_complex_tasks" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="reliability_complex_tasks" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa fleksibel aplikasi dalam menyesuaikan preferensi pengguna?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="user_preference_flexibility" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="user_preference_flexibility" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="user_preference_flexibility" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="user_preference_flexibility" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="user_preference_flexibility" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan kecepatan respon aplikasi saat menjalankan perintah?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="response_speed" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="response_speed" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="response_speed" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="response_speed" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="response_speed" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan ketersediaan fitur bantuan atau panduan saat mengalami kesulitan?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="help_feature_availability" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="help_feature_availability" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="help_feature_availability" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="help_feature_availability" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="help_feature_availability" value="5"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan keakuratan hasil atau informasi yang disediakan aplikasi?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_accuracy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_accuracy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_accuracy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_accuracy" value="4"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="information_accuracy" value="5"></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center">
                <button style="background-color: #828C51; color: white;" type="submit" class="btn shadow">Submit Feedback</button>
            </div>
        </div>
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
