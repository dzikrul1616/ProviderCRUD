
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('template')}}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('template')}}/assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('template')}}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{asset('template')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('template')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('template')}}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body>

<center>
  <main class="mt-0 main-content">
    <section>
      <div class="page-header min-vh-100">
        <div class="container" >
            <div>
                <div class="mx-auto col-xl-8 col-lg-5 col-md-6 d-flex flex-column mx-lg-0 py-3 px-3">
                    <div class="card">
                        <div class="card-header pb-0">
                        <div class="pb-0 card-header text-center">
                          <img src="@/assets/logos/Mukernas2023.png" class="navbar-brand-img h-3 mx-2 w-15" alt="main_logo">
                          <h6 class="font-weight-bolder py-2">VALIDASI PESERTA</h6>
                        </div>
                    </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 overflow-auto">
                      <table class="table align-items-left mb-0">
                        <form enctype="multipart/form-data" method="post" action="{{url('post-register')}}">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                              <p class="text-uppercase text-sm">Register Akun</p>
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label"
                                  >Email</label
                                >
                                <input class="form-control" type="email" placeholder="Masukkan Email" name="email"/>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label"
                                  >Password</label
                                >
                                <input class="form-control" type="password" placeholder="masukkan password" name="password"/>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              <hr class="horizontal dark" />
                              <p class="text-uppercase text-sm">Validasi Peserta</p>
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label"
                                  >Nama Lengkap</label
                                >
                                <input class="form-control" type="text" placeholder="Masukkan Nama Lengkap" name="nama_lengkap"/>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label"
                                  >No Telepon</label
                                >
                                <input class="form-control" type="text" placeholder="Masukkan No Telepon" name="no_hp"/>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label"
                                  >Alergi</label
                                >
                                <input class="form-control" type="text" placeholder="Isi apabila memiliki alergi" name="alergi"/>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label">Asal Instansi</label>
                                <select name="asal_instansi" class="form-control" v-model="selectedInstansi">
                                  <option value="" disabled selected style="text-align: center;">--- Klik untuk pilih universitas ---</option>
                                  <option value="Universitas Brawijaya">Universitas Brawijaya</option>
                                  <option value="Universitas Padang">Universitas Padang</option>
                                  <option value="Universitas Padjajaran">Universitas Padjajaran</option>
                                  <option value="Universitas Indonesia">Universitas Indonesia</option>
                                  <option value="Politeknik Negri Malang">Politeknik Negri Malang</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">Foto dengan Almamater</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  name="foto_almamater"
                                  id="example-file-input"   
                                />
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">Surat SPPD (Surat Perintah Perjalanan Dinas)</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  id="example-file-input"
                                  name="sppd"
                                />
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">Scan KTM</label>
                                <input name="ktm" class="form-control" type="file" id="example-file-input"/>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">Foto dengan Almamater</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  name="foto_almamater"
                                  id="example-file-input"
                                />
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">Bukti Pelunasan</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  id="example-file-input"
                                  name="bukti_pelunasan"
                                />
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>

                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">NOTA KESEPAKATAN</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  id="example-file-input"
                                  name="nota_kesepakatan"
                                />
                                <a href="#">
                                    <h6>Klik untuk mengunduh template berkas</h6>
                                </a>
                              </div>

                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">KONFIRMASI KEDATANGAN DAN KEPULANGAN</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  id="example-file-input"
                                  name="konfirmasi_kedatangan"
                                />
                                <a href="#">
                                    <h6>Klik untuk mengunduh template berkas</h6>
                                </a>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-file-input" class="form-control-label">SURAT IZIN ORANG TUA/WAL</label>
                                <input
                                  class="form-control"
                                  type="file"
                                  id="example-file-input"
                                  name="surat_izin"
                                />
                                <a href="#">
                                    <h6>Klik untuk mengunduh template berkas</h6>
                                </a>
                                <p class="text-xs text-muted mt-2" v-if="fileName"></p>
                              </div>
                              <div class="col-md-6">
                                <label for="example-text-input" class="form-control-label">Transportasi</label>
                                <select name="transportasi" class="form-control" v-model="selectedInstansi1">
                                  <option value="" disabled selected style="text-align: center;">---------- Klik untuk pilih kendaraan ----------</option>
                                  <option value="Pribadi">Pribadi</option>
                                  <option value="Kereta Api">Kereta Api</option>
                                  <option value="Pesawat">Pesawat</option>
                                  <option value="Bis">Bis</option>
                                </select>
                              </div>
                            </div>
                          </div>
                      </table>
                      <div class="col-6 text-home px-4 pb-4">
                        <button type="submit" class="btn btn-success">Validasi</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</center>




  <script src="{{asset('template')}}/assets/js/core/popper.min.js"></script>
  <script src="{{asset('template')}}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{asset('template')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{asset('template')}}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{asset('template')}}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>