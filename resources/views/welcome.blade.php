<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mukernas FORNAS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('Medicio') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('Medicio') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Medicio') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('Medicio') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Medicio') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medicio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a href="{{ url('/') }}" class="img-fluid logo me-auto"><img
                    src="{{ asset('frontend') }}/asset/logo mukernas-01 1.png" alt=""> <span>Fornas
                    SOSMA</span> </a>
            <center>
                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        <li><a class="nav-link scrollto" href="#berita">Berita</a></li>
                        <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    </ul>
                </nav>
            </center>
            <a href="https://welcome.mukernasfornassosma.site/" class="myAccount">My Account</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"
                    style="background-image: url({{ asset('Medicio') }}/assets/img/slide-1.png)">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 icon-box mt-2 mt-lg-0">
                                <i class="fa fa-map-marker-alt fa-2x"></i> <span></span>
                                <h4>Universitas Brawijaya</h4>
                                <p style="color: #848484">Jl. Veteran Malang, 65145</p>
                            </div>
                            <div class="col-md-3 icon-box mt-2 mt-lg-0">
                                <i class="fa fa-calendar fa-2x"></i>
                                <h4>120+ </h4>
                                <p style="color: #848484">Universitas</p>
                            </div>
                            <div class="col-md-3 icon-box mt-2 mt-lg-0">
                                <i class="fa fa-users fa-2x"></i>
                                <h4>200+ </h4>
                                <p style="color: #848484">Participation</p>
                            </div>
                            <div class="col-md-3 icon-box mt-2 mt-lg-0">
                                <br>
                                <a href="#about" class="text-center btn btn-lg"
                                    style="background: #816B3E; color: white;">Mulai Jelajah</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background-image: url({{ asset('Medicio') }}/assets/img/slide-2.png)">
                    <div style="margin-bottom: 200px; margin-right: 1110px;">
                        <a href="{{ url('inklusi') }}" class="text-center btn btn-lg"
                            style="background: #816B3E; color: white;">Mulai Jelajah</a>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true">
                    < </span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true">></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-6 col-lg-1 d-flex align-items-stretch mb-5 mb-lg-0">
                    </div>
                    <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
                        <img src="{{ asset('Medicio') }}/assets/img/side-1.png" height="200" alt="">
                    </div>

                    <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
                        <img src="{{ asset('Medicio') }}/assets/img/side-2.png" height="200" alt="">
                    </div>

                    <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
                        <img src="{{ asset('Medicio') }}/assets/img/side-3.png" height="200" alt="">
                    </div>
                    <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
                        <img src="{{ asset('Medicio') }}/assets/img/side-4.png" height="200" alt="">
                    </div>

                    <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
                        <img src="{{ asset('Medicio') }}/assets/img/side-5.png" height="200" alt="">
                    </div>
                    <div class="col-md-6 col-lg-1 d-flex align-items-stretch mb-5 mb-lg-0">
                    </div>

                </div>

            </div>
        </section><!-- End Featured Services Section -->
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about"
            style="background-image: url({{ asset('frontend') }}/asset/avector.png); background-repeat: no-repeat;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p style="font-size: 40px; font-weight: bold;">PENGENALAN</p>
                    <p class="text-gradient">MUKERNAS FORNAS SOSMA</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="{{ asset('frontend') }}/asset/logo-fornas.png" class="img-fluid" alt="">
                    </div>
                    <div style="margin-top: 160px;" class=" col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                        Mukernas Fornassosmas BEM se-Indonesia
                        merupakan salah satu musyawarah tertinggi dalam
                        organisasi Forum Nasional Sosmas BEM se-Indonesia,
                        di mana dalam forum ini membahas mengenai grand desain,
                        kepengurusan, dan tuan rumah Mukernas Fornassosmas periode kedepan.
                        Serta dalam penyelenggaraanya dibungkus dengan beberapa agenda acara seperti Malam keakraban,
                        Opening ceremony, Closing Ceremony dan Fieldtrip
                    </div>
                </div>

            </div>
            <br><br><br><br><br><br><br><br>
        </section><!-- End About Us Section -->

        <!-- ======= Counts Section ======= -->
        <section id="#" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p style="font-size: 40px; font-weight: bold;">FILOSOFI LOGO</p>
                    <p class="text-gradient">MUKERNAS FORNAS SOSMA</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="{{ asset('frontend') }}/asset/filosofi.png" class="img-fluid" alt="">
                    </div>
                    <div class="mt-5 col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h2 class="font-bold">Filosofi Logo</h2>
                        <p class="mt-4">
                            Kami membuat Logo Mukernas Fornasosmas 2023 ini <br>
                            supaya dapat menggambarkan peranan aktif forum<br>
                            nasional sosial masyarakat dalam menjalankan<br>
                            musyawarah kerja nasional yang akan dilaksanakan<br>
                            di Universitas Brawijaya
                        </p>
                        <p>
                            Logo ini dibuat sesuai dengan tema<br>
                            yaitu "Indonesia yang Inklusi dan Ramah Disablilitas" yang<br>
                            diilustrasikan dengan merangkul sesama
                        </p>
                        <p>
                            Logo ini juga menjadi ilustrasi<br>
                            pengharapan atas suksesnya acara ini dengan bersama-<br>
                            sama melakukan musyawarah kerja nasional yang akan<br>
                            memberikan dampak positif bagi kehidupan kita bersama.
                        </p>
                        <h2 class="font-bold">Filosofi Warna</h2>
                        <img src="{{ asset('Medicio') }}/assets/img/warna.png">


                    </div>
                </div>

            </div>
            <br><br><br><br><br>
        </section>
        <section id="berita" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p style="font-size: 40px; font-weight: bold;">BERITA FORNAS SOSMA</p>
                    <p class="">Berikut adalah berita terkait kegiatan <br> pelaksanaan Mukernas Fornas Sosma
                        2023: </p>
                </div>

                <div class="row bernas">

                </div>
        </section>

        <section id="faq" class="testimonials"
            style="margin-bottom: 100px; background-position: right; background-image: url({{ asset('Medicio') }}/assets/img/bg-kanan.png);
             background-repeat: no-repeat;
             ">
            <div class="container" data-aos="fade-up">
                <div class="card" style="background: #fafafa; margin-top: 80px;">
                    <div class="row container mb-3 mt-3">
                        <div class="col-md-3" style="margin-top: 100px;">
                            <p class="mb-0" style="color: #BC9743; margin-left:80px;">FAQ</p>
                            <p class="mt-1" style="font-weight: bold; font-size: 20px; margin-left: 80px;">
                                Frequently <br> Asked Question</p>

                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mt-4">Bagaimana cara membuat akun?</h5>
                                    <p>Teman teman bisa klik My Account pada pojok kanan atas atau mengunjungi :
                                        <a href="https://www.mukernasfornassosma.site/register"> Link ini </a>
                                    </p>
                                    <h5 class="mt-4">Bagaimana cara melihat penjemput dan LO peserta?</h5>
                                    <p>Dengan cara registrasi terlebih dahulu kemudian login dengan akun yang telah
                                        didaftarkan maka akan tampil contact person tertera
                                    </p>
                                    <h5 class="mt-4">Bagaimana jika terdapat bug/crash pada website?</h5>
                                    <p class=" mb-4">Teman teman dapat menghubungi contact person tertera pada footer
                                        website kami atau dm instagram kami pada footer</p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mt-4">Bagaimana cara melihat informasi kegiatan?</h5>
                                    <p>Informasi kegiatan akan ditampilkan pada laman berita pada
                                        www.mukernasfornassosma.site muali dari pra acara hingga pasca acara</p>
                                    <h5 class="mt-4">Bagaimana jika registrasi tidak ada nama instansi/universitas
                                        belum tersedia?</h5>
                                    <p class=" mb-4">Teman teman dapat menghubungi contact person yang berada di
                                        paling bawah website (footer) untuk menghubungi langsung admin mukernas untuk
                                        menemukan solusinya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </main>

    {{-- style="background-image: url({{ asset('frontend') }}/asset/logo-fornas.png);
    background-repeat: no-repeat;
    background-size: 400px; " --}}


    <footer id="footer">
        <div class="footer-top gambarfooter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <img src="{{ asset('frontend') }}/asset/logo-fornas.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-3 mt-2 col-md-4">
                        <div class="footer-info">
                            <img src="{{ asset('frontend') }}/asset/logo-putih.png" alt="">
                            <span style="font-size: 19px; font-weight: bold;">Fornas SOSMA</span>
                            <p>
                            <div class="footer-links">
                                <ul>
                                    <li><i class="fa fa-map-marker-alt fa-2x mb-4"></i> &nbsp&nbsp&nbsp
                                        <a target="_blank" style="line-height: 20px; margin-left= 30px;"
                                            class="text-white"
                                            href="https://www.google.com/maps/place/Universitas+Brawijaya/@-7.9566765,112.6122154,16.61z/data=!4m15!1m8!3m7!1s0x2e78827bee11a2ab:0x12c931733bd6f517!2sJl.+Veteran+Malang,+Ketawanggede,+Kec.+Lowokwaru,+Kota+Malang,+Jawa+Timur!3b1!8m2!3d-7.9561824!4d112.6146929!16s%2Fg%2F11ddzy6lwb!3m5!1s0x2e78827f2d620975:0xf19b7459bbee5ed5!8m2!3d-7.9526403!4d112.6143754!16s%2Fm%2F04ct9h8">Jl.
                                            Veteran
                                            Malang, Ketawanggede, <br> Kec. Lowokwaru, Kota Malang, <br> Jawa Timur
                                            65145</a>
                                    </li>
                                    <br><br>
                                    <li> &copy; 2023 <span>, Divisi Database Mukernas 2023</span>.
                                    </li>
                                </ul>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-5 footer-links">
                        <h4>Social Media </h4>
                        <ul>
                            <li><i class="fa-brands fa-tiktok"></i> <a target="_blank" class="text-white"
                                    href="https://www.tiktok.com/@mukernasfornas"> &nbsp
                                    Tiktok</a></li>
                            <li><i class="fa-brands fa-instagram"></i> <a target="_blank" class="text-white"
                                    href="https://www.instagram.com/mukernas_sosmas2023/"> &nbsp
                                    Instagram</a></li>
                            <li><i class="fa-brands fa-whatsapp"></i> <a target="_blank" class="text-white"
                                    href="https://wa.link/e0hpqk"> &nbsp
                                    Contact Person</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4  footer-links">
                        <img src="{{ asset('medicio') }}/assets/img/footer-kanan.png"
                            class="img-fluid"alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('Medicio') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('Medicio') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('Medicio') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Medicio') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('Medicio') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('Medicio') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('Medicio') }}/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('api/beritas') }}",
            type: 'GET',
            success: function(response) {
                var datas = response.data;
                console.log(response.data)
                var row = $('.bernas');

                $.each(datas, function(index, berita) {
                    var col = $('<div class="col-md-3"></div>');
                    var card = $('<div class="card my-3"></div>');
                    var img = $('<img height="150px;" src="storage/' + berita.file +
                        '" class="card-img">');
                    img.css('max-width', '100%', 'max-height', '250px',
                        'object-fit', 'cover');
                    var cardBody = $('<div class="card-body"></div>');
                    var title = $('<h5 class="carsd-title fw-semibold">' + (berita.judul
                        .length > 10 ? berita.judul.substring(0, 10) + '...' :
                        berita.judul) + '</h5>');
                    var desc = $('<p class="card-text">' + (berita.deskripsi.length > 20 ?
                        berita.deskripsi.substring(0, 20) + '...' : berita.deskripsi
                    ) + '</p>');
                    var link = $('<a href="detail-berita/' + berita.id +
                        '"style="float:right; background-color: #BC9743; color: #fff;" class="btn btn gradient">Selengkapnya</a>'
                    );

                    cardBody.append(title);
                    cardBody.append(desc);
                    cardBody.append(link);
                    card.append(img);
                    card.append(cardBody);
                    col.append(card);
                    row.append(col);
                });
            }
        });
    });
</script>
