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
            <a href="index.html" class="img-fluid logo me-auto"><img
                    src="{{ asset('frontend') }}/asset/logo mukernas-01 1.png" alt=""> <span>Fornas
                    SOSMA</span> </a>
            <a href="https://welcome.mukernasfornassosma.site/" class="myAccount">My Account</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">

                    <h2>{{ $berita->judul }}</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Detail Berita</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <img class="card-img-top"height="500" width="1270"
                            src="{{ asset('storage/' . $berita->file) }}" alt="Card image cap">
                        <div class="card-body">
                            <p>{{ $berita->deskripsi }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/') }}" class="text-center btn btn-lg"
                                style="float:right; background: #816B3E; color: white;"><i
                                    class="fa fa-rotate-left"></i> Kembali</a>
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
                        <img src="{{ asset('medicio') }}/assets/img/footer-kanan.png" class="img-fluid"alt="">
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
                    var img = $('<img src="storage/file/' + berita.file +
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
