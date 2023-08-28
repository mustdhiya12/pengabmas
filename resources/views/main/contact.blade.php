<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Unica - Contact Us</title>
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=649a36bc940f820012547f57&product=privacy-policy-generator&source=platform" async="async">
  </script>
  <style>
  .preview-img {
        width: 568px;
        height: 568px;
        object-fit: contain;
    }
  </style>
</head>

<body>
  @include('main/navbar')
  <div style="margin-top:150px;" class="container m-3 p-3"></div>
  <div style="margin-top:150px;" class="container m-3 p-3"></div>

  <!-- Main Navigation -->
    <!-- VIDEO AREA START -->
    <script src="https://apis.google.com/js/api.js"></script>
    <div class="ltn__video-popup-area ltn__video-popup-margin">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="videoThumbnailDiv" style="border-radius: 5px;transform: scale(0.8);" class="ltn__video-bg-img ltn__video-popup-height-600 bg-overlay-black-10-- bg-image">
              <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/1A7scJbKfvY" data-rel="lightcase:myCollection">
                <i class="fa fa-play"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- VIDEO AREA END -->


    <!-- TESTIMONIAL AREA START (testimonial-4) -->
    @php
    $testimonials = [
    [
    'image' => "icon/pru.png",
    'content' => 'Kontinuitas Layanan: Stabilitas aplikasi kita luar biasa. Penggunaan metode otomatisasi dan deployment yang
    terencana telah membantu memastikan bahwa layanan tetap tersedia dan berjalan lancar tanpa hambatan besar.',
    'name' => 'RUDIMAN, S.KOM., M.SC.',
    'title' => 'Concept Developer',
    ],
    [
    'image' => "icon/pru.png",
    'content' => 'Skalabilitas yang Mumpuni: Saya senang melihat bagaimana tim DevOps berhasil mengatasi lonjakan lalu lintas yang besar tanpa adanya kendala.
    Kemampuan kalian untuk merancang lingkungan yang dapat diskalakan dengan cepat adalah aset berharga bagi keseluruhan bisnis.',
    'name' => 'ROFILDE HASUDUNGAN, S.Kom., M.Sc',
    'title' => 'DevOps Engineer',
    ],
    [
    'image' => "icon/pro.png",
    'content' => 'Kerja Tim yang Solid: Kolaborasi yang harmonis antara tim DevOps dengan tim pengembang lainnya terlihat jelas dalam hasil akhir.
    Pemahaman kalian tentang kebutuhan pengembangan dan kemampuan untuk memenuhi permintaan dengan cepat sangat diapresiasi.',
    'name' => 'Muhammad Fauzan Nur Ilham',
    'title' => 'Software Developer/Programmer',
    ],
    [
    'image' => "icon/pri.png",
    'content' => 'Peningkatan Berkelanjutan: Saya senang melihat kalian terus mencari cara untuk meningkatkan proses deployment dan efisiensi kerja.
    Inisiatif untuk menerapkan praktik CI/CD baru dan teknologi terbaru adalah contoh nyata dari komitmen kalian terhadap inovasi.',
    'name' => 'Muhammad Haikal Mahardika',
    'title' => 'Software Developer/Programmer',
    ],
    [
    'image' => "icon/pri.png",
    'content' => 'Monitoring dan Analisis yang Canggih: Implementasi sistem monitoring dan analisis kalian memungkinkan kami untuk mengawasi kinerja aplikasi secara real-time.
    Ini memudahkan kami untuk mendeteksi potensi masalah dan mengambil tindakan pencegahan sebelum pengguna terpengaruh.',
    'name' => 'Pandu Wirayuda',
    'title' => 'Software Developer/Programmer',
    ],
    // Add more testimonials here
    ];
    @endphp
    <div class="ltn__testimonial-area section-bg-1 pt-290 pb-70">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 text-center">
              <h6 class="section-subtitle ltn__secondary-color">// Ulasan</h6>
              <h1 class="section-title">Tanggapan Klien<span>.</span></h1>
            </div>
          </div>
        </div>
        <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
          @foreach($testimonials as $testimonial)
          <div class="col-lg-12">
            <div class="ltn__testimonial-item ltn__testimonial-item-4">
              <div class="ltn__testimoni-img ">
                <img src="{{ $testimonial['image'] }}" class="rounded-5" alt="#">
              </div>
              <div class="ltn__testimoni-info">
                <p>{{ $testimonial['content'] }}</p>
                <h4>{{ $testimonial['name'] }}</h4>
                <h6>{{ $testimonial['title'] }}</h6>
              </div>
              <div class="ltn__testimoni-bg-icon">
                <i class="far fa-comments"></i>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- BLOG AREA START (blog-3) -->
    @php
    $blogs = [
    [
    'image' => 'picture/1.png',
    'author' => 'Admin',
    'category' => 'DevOps Engineer',
    'title' => 'Profile Muhammad Fauzan Nur Ilham',
    'date' => 'Agt 21, 2024',
    'route' => 'main.fauzan'
    ],
    [
    'image' => 'picture/2.png',
    'author' => 'Admin',
    'category' => 'Software Developer/Programmer',
    'title' => 'Profile Pandu Wirayuda',
    'date' => 'Agt 21, 2024',
    'route' => 'main.pandu'
    ],
    [
    'image' => 'picture/3.png',
    'author' => 'Admin',
    'category' => 'Software Developer/Programmer',
    'title' => 'Profile Muhammad Haikal Mahardika',
    'date' => 'Agt 21, 2024',
    'route' => 'main.haikal'
    ],
    ];
    @endphp
    <div class="ltn__blog-area pt-115 pb-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- <div class="section-title-area ltn__section-title-2 text-center">
              <h6 class="section-subtitle ltn__secondary-color">// Pengenalan</h6>
              <h1 class="section-title white-color---">Blog Profil<span>.</span></h1>
            </div> -->
          </div>
        </div>
        <div class="row ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
          @foreach($blogs as $blog)
          <!-- Blog Item -->
          <!-- <div class="col-lg-12">
            <div class="ltn__blog-item ltn__blog-item-3">
              <div class="ltn__blog-img">
                <a href="{{ route($blog['route']) }}"><img src="{{ $blog['image'] }}" alt="#"></a>
              </div>
              <div class="ltn__blog-brief">
                <div class="ltn__blog-meta">
                  <ul>
                    <li class="ltn__blog-author">
                      <a href="#"><i class="far fa-user"></i>by: {{ $blog['author'] }}</a>
                    </li>
                    <li class="ltn__blog-tags">
                      <a href="#"><i class="fas fa-tags"></i>{{ $blog['category'] }}</a>
                    </li>
                  </ul>
                </div>
                <h3 class="ltn__blog-title"><a href="{{ route($blog['route']) }}">{{ $blog['title'] }}</a></h3>
                <div class="ltn__blog-meta-btn">
                  <div class="ltn__blog-meta">
                    <ul>
                      <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ $blog['date']
                                            }}</li>
                    </ul>
                  </div>
                  <div class="ltn__blog-btn">
                    <a href="{{ route($blog['route']) }}">Baca selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          @endforeach
          <!--  -->
        </div>
      </div>
    </div>

    <!-- BLOG AREA END -->



  <!-- FEATURE AREA START ( Feature - 3) -->
  <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
            @php
            // Inisialisasi array fitur
            $features = [
            [
            'icon' => 'img/icons/icon-img/11.png',
            'title' => 'Produk Terpilih',
            'description' => 'Produk terpilih yang dipilih dengan cermat untuk menawarkan kualitas dan variasi terbaik.',
            ],
            [
            'icon' => 'img/icons/icon-img/12.png',
            'title' => 'Buatan Tangan',
            'description' => 'Kreasi unik buatan tangan yang dibuat dengan keterampilan dan semangat.',
            ],
            [
            'icon' => 'img/icons/icon-img/13.png',
            'title' => 'Kualitas Tinggi',
            'description' => 'Produk luar biasa yang dibedakan oleh kualitas unggulnya.',
            ],
            [
            'icon' => 'img/icons/icon-img/14.png',
            'title' => 'Inspirasi Harian',
            'description' => 'Dosis harian inspirasi berbelanja untuk meningkatkan pengalaman belanja Anda.',
            ],
            ];
            @endphp

            <div class="row">
              @foreach($features as $feature)
              <div class="col-xl-3 col-md-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-8">
                  <div class="ltn__feature-icon">
                    <img src="{{ $feature['icon'] }}" alt="#">
                  </div>
                  <div class="ltn__feature-info">
                    <h4>{{ $feature['title'] }}</h4>
                    <p>{{ $feature['description'] }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FEATURE AREA END -->

  <!-- FOOTER AREA START -->
  <footer class="ltn__footer-area  ">
    <div class="footer-top-area  section-bg-1 plr--5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-3 col-md-6 col-sm-6 col-12">
            <div class="footer-widget footer-about-widget">
              <div class="footer-logo">
                <div class="site-logo">
                  <h6 class="text-uppercase fw-bold mb-4">
                    <a href="#">
                      <img src="{{ asset('icon/Icon_unican.png') }}" style="width: 32px; height: 32px; filter: grayscale(100%);">
                      <u style="color: grey; text-decoration: none;">
                        _U N I C A_
                      </u>
                    </a>
                  </h6>
                </div>
              </div>
              <div class="footer-address">
                <ul>
                  <li>
                    <div class="footer-address-icon">
                      <i class="icon-placeholder"></i>
                    </div>
                    <div class="footer-address-info">
                      <p>Jl. Ir. H. Juanda No.15, Sidodadi, Kec. Samarinda Ulu, Kota Samarinda,
                        Kalimantan Timur 75124</p>
                    </div>
                  </li>
                  <li>
                    <div class="footer-address-icon">
                      <i class="icon-call"></i>
                    </div>
                    <div class="footer-address-info">
                      <p><a href="tel:+6281254888102"> + 62 812 548 881 02</a></p>
                    </div>
                  </li>
                  <li>
                    <div class="footer-address-icon">
                      <i class="icon-mail"></i>
                    </div>
                    <div class="footer-address-info">
                      <p><a href="mailto:mustfauzan0@gmail.com">mustfauzan0@gmail.com</a></p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="ltn__social-media mt-20">
                <ul>
                  <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-md-6 col-sm-6 col-12 offset-xl-4">
            <div class="footer-widget footer-menu-widget clearfix">
              <h4 class="footer-title">Pusat Perusahaan</h4>
              <div class="footer-menu">
                <ul>
                  <li><a href="{{route('main.pr')}}">FAQ</a></li>
                  <li><a href="{{route('main.pr')}}">Hubungi kami</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 col-sm-12 col-12 ">
            <div class="footer-widget footer-newsletter-widget">
              <h4 class="footer-title">Hubungi kami</h4>
              <p>Hubungi kami jika ada sebuah masalah.</p>
              <div class="footer-newsletter">
                <form action="#">
                  <input type="email" name="email" placeholder="Email*">
                  <div class="btn-wrapper">
                    <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-2  ltn__border-top-2--- plr--5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="ltn__copyright-design clearfix">
              <p>Semua Hak Dilindungi Undang-Undang @UNICA oleh Muhammad Fauzan Nur Ilham <span>2023</span></p>
            </div>
          </div>
          <div class="col-md-6 col-12 align-self-center">
            <div class="ltn__copyright-menu text-right">
              <ul>
                <li><a href="#">Syarat & Ketentuan</a></li>
                <li><a href="#">Tuntutan</a></li>
                <li><a href="{{ route('main.pr') }}">Kebijakan Privasi</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- FOOTER AREA END -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    // Replace 'YOUR_YOUTUBE_API_KEY' with your actual YouTube Data API key
    var apiKey = 'AIzaSyCTwzcu-TPGQQlFMXWSby9xpAA7YpKvod8';
    var videoId = '1A7scJbKfvY'; // Replace with the YouTube video ID
    var vidId = 'Qrku0qImWyo';

    function fetchVideoDetailsAndSetThumbnails() {
      // URL endpoint API
      var apiUrl = 'https://www.googleapis.com/youtube/v3/videos';

      // Parameter permintaan
      var params = {
        part: 'snippet',
        key: apiKey
      };
      var videoIds = [videoId, vidId];

      // Permintaan GET ke YouTube Data API v3 menggunakan fetch() untuk setiap video ID
      videoIds.forEach(id => {
        fetch(apiUrl + '?' + new URLSearchParams({
            ...params,
            id: id
          }))
          .then(response => response.json())
          .then(data => {
            if (data.items.length > 0) {
              var videoDetails = data.items[0].snippet;
              var thumbnailUrl = videoDetails.thumbnails.high.url;

              var videoThumbnailDiv = document.getElementById('videoThumbnailDiv');
              var videoThumbnailDiv1 = document.getElementById('videoThumbnailDiv1');

              if (id === videoId) {
                videoThumbnailDiv.style.backgroundImage = 'url(' + thumbnailUrl + ')';
              } else if (id === vidId) {
                videoThumbnailDiv1.style.backgroundImage = 'url(' + thumbnailUrl + ')';
              }
            }
          })
          .catch(error => {
            console.error('Kesalahan mengambil detail video:', error);
          });
      });
    }

    fetchVideoDetailsAndSetThumbnails();
  </script>

</body>

</html>