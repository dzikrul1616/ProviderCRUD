<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukernas Fornas</title>
    <link href="{{asset('frontend/bootstrap/bootstrap.css')}}" rel="stylesheet">

    <!--font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!--my style-->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
    <!--logo title-->
    <link rel="icon" href="{{asset('frontend')}}/asset/logo mukernas-01 1.png" type="image/x-icon">
  </head>

  <body>                                       
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{asset('frontend')}}/asset/logo mukernas-01 1.png" alt="Bootstrap" width="80" height="64">Fornas SOSMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2">
              <a class="nav-link home" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#pengenalan">Tentang</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#berita">Berita</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#faq">FAQ</a>
            </li>
          </ul>
          <div>
          <a href="{{url('auth/google')}}" class="btn btn-secondary">My Account</a>
          </div>
          
        </div>
      </div>
    </nav>
    <!--end navbar-->

    <!--carousel-->
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner container">
        <div class="carousel-item active mt-4">
          <img src="{{asset('frontend')}}/asset/header.png" class="d-block w-100" alt="...">
          <div class="caraousel-caption border">
            <a class="btn btn-outline-light d-inline px-4"  href="#pengenalan" >Mulai Jelajah</a>
          </div>
        </div>
        <div class="carousel-item mt-4">
          <img src="{{asset('frontend')}}/asset/header2.png" class="d-block w-100" alt="...">
        </div>
        <!--<div class="carousel-item">
          <img src="..." class="" alt="...">
        </div>-->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!--end carousel-->

    <!--section logo-->
    <section id="logo">
    <div class="logo_internal justify-content-center text-center">
      <img class="img-fluid" src="{{asset('frontend')}}/asset/Eksplore (18) 1.png" alt="image" >
      <img class="img-fluid" src="{{asset('frontend')}}/asset/1200px-Logo_Universitas_Brawijaya 1.png" alt="image" >
      <img class="img-fluid" src="{{asset('frontend')}}/asset/MhgM0ImP_400x400 1.png" alt="image" >
      <img class="img-fluid" src="{{asset('frontend')}}/asset/android-chrome-512x512 1.png" alt="image" >
      <img class="img-fluid" src="{{asset('frontend')}}/asset/Eksplore (17) 1.png" alt="image" >
    </div>
    </section>
    <!--end section logo-->

    <!--section partner-->
    <section id="partner">
    <div class="partner">
      <h2 style="font-size: 28px">PARTNER KAMI</h2>
      <div class="sponsor img-fluid">
        <img src="{{asset('frontend')}}/asset/VectorX.png" alt="" class="{{asset('frontend')}}/asset-img">
        <img src="{{asset('frontend')}}/asset/Vector (1).png" alt="" class="{{asset('frontend')}}/asset-img">
        <img src="{{asset('frontend')}}/asset/Vector (2).png" alt="" class="{{asset('frontend')}}/asset-img">
        <img src="{{asset('frontend')}}/asset/Vector (3).png" alt="" class="{{asset('frontend')}}/asset-img">
        <img src="{{asset('frontend')}}/asset/Vector.png" alt="" class="{{asset('frontend')}}/asset-img">
      </div>
    </div>
  </section>
    <!--End section partner-->

    <!--section pengenalan-->
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <div class="">
      <div class="text-center mb-5">
        <br><br><br>
        <h2 class="text-center fs-1 mt-4 fw-semibold" id="pengenalan">PENGENALAN</h2>
        <h2 class="text-center fs-1 h2sect3 text-mukernas fw-semibold">MUKERNAS FORNAS SOSMA</h2>
      </div>
    <div class="row pt-5">
        <div class="col-md-6 col-12 position-relative">
            <img src="{{asset('frontend')}}/asset/Vectorsect3.png" alt="" class="fector">
            <img src="{{asset('frontend')}}/asset/logo-fornas.png" alt="" class="logos position-absolute">
        </div>
        <div class="col-md-6 col-12">
          <p class="text-pengenalan mt-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
              eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
              ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat
              massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
              rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer
              tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo
              ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
              feugiat a, tellus. Phasellus viverra nulla ut</p>
        </div>
    </div>
    </div>
    <!--end section pengenalan-->

    <!--section filosofi-->
    <div class="filosofi">
      <h2 style="font-size:36px"><span class="fw-semibold">FILOSOFI LOGO</span></h2>
        <div class="h2sect4"><h2 style="font-size:36px"><span class="fw-semibold">MUKERNAS FORNAS SOSMA</span></h2>
        </div>
        <img src="{{asset('frontend')}}/asset/Filosofi Mukernas 1.png" alt="" class="img-fluid">
    </div>
    <!--end section filosofi-->

    <!--Section berita-->
    <div class="berita">
      <h2 style="font-size:36px"><span class="fw-semibold" id="berita">Berita FORNAS SOSMA</span></h2>
      <P class="desc_berita">adalah berita terkait kegiatan<br>pelaksanaan Mukernas Fornas Sosma 2023 :</P>
    </div>
    <div class="container">
      <div class="row bernas shadow-sm p-5 mb-5 bg-white rounded-5 border-radius-2">
        <!-- <div class="col-md-3">
          <div class="card" id="berita-list">
            <img src="{{asset('frontend')}}/asset/Rectangle 322.png" class="" alt="...">
            <div class="card-body">
              <h5 class="card-title fw-semibold">INFORMASI PEMBAGIAN LO (Liaison Officer)</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div> -->
        
      </div>
    </div>
    <section id="faq">
    <!--end section berita-->

    <!--section FAQ page-->
    
    <div class="p-3 mb-2 bg-white text-dark container bgfaq">
    <div class="container text-center p-5 faq">
      <div class="row">
        <div class="col align-self-center">
          <p style="text-align:left; margin-left: 45px;">
            <span style="font-size: 16px; font-weight: 600; color: #BC9743;
            ;">FAQ</span><br><span style="font-size: 36px; font-weight:600;">Frequently Asked Question</span>
          </p>
        </div>
        <div class="col align-self-center">
          <div class="row">
          <span style="font-weight:600; text-align:left">bagaimana melihat LO?</span>
        </div>
        <div class="row">
          <span style="text-align:left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda fugiat ab asperiores facere velit sapiente.</span><br>
        </div>
        <div class="row">
          <span style="font-weight:600; text-align:left">bagaimana melihat LO?</span>
        </div>
        <div class="row">
          <span style="text-align:left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda fugiat ab asperiores facere velit sapiente.</span>
        </div>
        <div class="row">
          <span style="font-weight:600; text-align:left">bagaimana melihat LO?</span>
        </div>
        <div class="row">
          <span style="text-align:left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda fugiat ab asperiores facere velit sapiente.</span>
        </div>
        </div>
        <div class="col align-self-end">
          <div class="row">
            <span style="font-weight:600; text-align:left">bagaimana melihat LO?</span>
          </div>
          <div class="row">
            <span style="text-align:left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda fugiat ab asperiores facere velit sapiente.</span>
          </div>
          <div class="row">
            <span style="font-weight:600; text-align:left">bagaimana melihat LO?</span>
          </div>
          <div class="row">
            <span style="text-align:left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda fugiat ab asperiores facere velit sapiente.</span>
          </div>
          <div class="row">
            <span style="font-weight:600; text-align:left">bagaimana melihat LO?</span>
          </div>
          <div class="row">
            <span style="text-align:left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda fugiat ab asperiores facere velit sapiente.</span>
          </div>
        </div>
      </div>
      </section>
      <!-- <div class="bg1faq">
        <img src="{{asset('frontend')}}/asset/bg1FAQ.png" alt="">
      </div> -->
      <!--<div class="bg2faq">
        <img src="{{asset('frontend')}}/asset/bg2FAQ.png" alt="">
      </div>-->
    </div>
    </div>
   
    <!--end section FAQ page-->

    <!--Footer section-->
    <style>


    </style>
    <div class="container footer">
        <div class="footer-background">

        </div>
    </div>
    <div class="container footer">
      <div class="footer-backgorund">
        <div class="footer-main">
          <img class="img-fornas" src="{{asset('frontend')}}/asset/logo-fornas.png">
          <div class="colom1 col-2">
            <div class="img-fornassosma">
              <img src="{{asset('frontend')}}/asset/Eksplore (13) 1.png">
              <img src="{{asset('frontend')}}/asset/Fornas SOSMA.png">
            </div>
            <div class="address">
              <img class="img-location" src="{{asset('frontend')}}/asset/location.png">
              <a style="text-decoration:none; color: white;" href="https://goo.gl/maps/kjnFfduEbdYso1Mb8" target="_blank">JL. Veteran Malang, Ketawanggede, kec. Lowokwaru, Kota Malang, Jawa Timur 65145</a>
            </div>
            <div class="copyright">
              &copy; 2023, Divisi Database Mukernas 2023
            </div>
          </div>
          <div class="colom2">
            <div class="socialmedia">
              Social Media
            </div>
            <div class="list1">
              <img class="img-tiktok" src="{{asset('frontend')}}/asset/tik-tok.png">
              <a style="text-decoration:none; color: white;" href="https://www.tiktok.com/@mukernasfornas" target="_blank">Tiktok</a>
            </div>
            <div class="list2">
              <img class="img-ig" src="{{asset('frontend')}}/asset/instagram.png">
              <a style="text-decoration:none; color: white;" href="https://instagram.com/mukernas_sosmas2023" target='_blank'>Instagram</a>
            </div>
          </div>
          <div>
            <img class="img-eksplore" src="{{asset('frontend')}}/asset/Eksplore (13) 2.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <!--end footer section -->

    <script src="{{asset('frontend')}}/js/bootstrap.js"></script>
    <script src="{{asset('frontend')}}/js/popper.min.js"></script>
  </body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script>

$(document).ready(function() {
  $.ajax({
    url: "{{url('api/beritas')}}",
    type: 'GET',
    success: function(response) {
      var datas = response.data;
    console.log(response.data)
      var row = $('.bernas');

      $.each(datas, function(index, berita) {
        var col = $('<div class="col-md-3"></div>');
        var card = $('<div class="card my-3"></div>');
        var img = $('<img src="storage/file/' + berita.file + '" class="card-img">'); img.css('max-width', '100%', 'max-height', '250px',
  'object-fit', 'cover');
        var cardBody = $('<div class="card-body"></div>');
        var title = $('<h5 class="carsd-title fw-semibold">' + (berita.judul.length > 10 ? berita.judul.substring(0, 10) + '...' : berita.judul)  + '</h5>');
        var desc = $('<p class="card-text">' + (berita.deskripsi.length > 20 ? berita.deskripsi.substring(0, 20) + '...' : berita.deskripsi) + '</p>');
        var link = $('<a href="#" class="btn btn-primary">Selengkapnya</a>');

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
