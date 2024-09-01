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
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Name (optional)</label>
                <input type="text" class="form-control shadow-sm" id="username" name="username" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email (optional)</label>
                <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <table class="table table-striped bg-white shadow-sm">
                            <tbody>
                                <tr>
                                    <th scope="row"> </th>
                                    <td class="text-center">Sangat Puas</td>
                                    <td class="text-center">Puas</td>
                                    <td class="text-center">Tidak Puas</td>
                                    <td class="text-center">Sangat Tidak Puas</td>
                                </tr>
                                <form action="{{ route('welcome.save') }}" method="post">
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan kemudahan penggunaan aplikasi sentuh tanah?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ease_of_use" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa intuitif antarmuka pengguna aplikasi sentuh tanah?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="interface_intuitiveness" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Apakah aplikasi sentuh tanah responsif saat digunakan?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="responsiveness" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan kelengkapan fitur yang tersedia di sentuh tanah?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_completeness" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Apakah fitur aplikasi sentuh tanah sesuai kebutuhan Anda?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="feature_suitability" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan stabilitas sentuh tanah <small>(tval1ueak ada crash/error)</small>?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="stability" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan tampilan dan desain antarmuka aplikasi sentuh tanah?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="ui_design" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan layanan dukungan pelanggan aplikasi sentuh tanah?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="customer_support" value="4"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seberapa puas Anda dengan tingkat keamanan dan privasi yang ditawarkan?</th>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="1"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="2"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="3"></td>
                                        <td class="text-center"><input class="form-check-input" type="radio" name="security_and_privacy" value="4"></td>
                                    </tr>
                                </form>
                            </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="feedback" class="form-label">Additional Comments</label>
                <textarea class="form-control shadow-sm" id="feedback" name="additional_feedback" rows="3"
                    placeholder="Bagikan pendapat Anda..."></textarea>
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
  </body>
</html>
