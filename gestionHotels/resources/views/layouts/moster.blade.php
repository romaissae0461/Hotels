<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HAJZ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('TheEvent/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('TheEvent/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('TheEvent/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('TheEvent/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('TheEvent/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('TheEvent/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('TheEvent/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('TheEvent/assets/css/style.css')}}" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: TheEvent
  * Updated: Feb 06 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  
<main class="container">
            @yield("content")
        </main>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a><span>Hajz</span></a></h1>
        <!-- <a href="index.html" class="scrollto"><img src="{{asset('TheEvent/assets/img/logo.png')}}" alt="" title=""></a> -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#hotels">Hotels</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        <ul>
            <a class="buy-tickets scrollto" href="#buy-tickets">Reserver maintenant</a>
        </ul>

      </nav><!-- .navbar -->
      <!-- <ul>
        <a class="buy-tickets scrollto" href="#buy-tickets">Buy Tickets</a>
      </ul> -->

    </div>
  </header><!-- End Header -->

  <div data-calpa-component-boundary="b-index-lp-web-mfe/HeroBannerDesktop">
    <div>
        <div class="">
            <div class="d3a79da279 ad6b2ff74b">
                <div class="a6f726f042">
                    <header><h1>
                        <span data-testid="herobanner-title1" class="f49c3e3e97 fb4fcd9c72 b940d0c9d3"></span></h1></header>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Bienvenue sur <br><span><strong>HAJZ</strong></span><br></h1>
      <p class="mb-4 pb-0">L'environnement Convenable pour vos réservations</p>
      <a href="#about" class="about-btn scrollto">About Us</a>
      <form action="recherche.php" method="GET">
                <div class="row">
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label for="checkin_date" class="font-weight-bold text-white">Arrivée</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="icon-calendar"></span></div>
                      <input type="date" id="checkin_date" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label for="checkout_date" class="font-weight-bold text-white">Départ</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="icon-calendar"></span></div>
                      <input type="date" id="checkout_date" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="adults" class="font-weight-bold text-white">Adultes</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="adults" class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4+</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="children" class="font-weight-bold text-white">Enfants</label>
                        <div class="field-icon-wrap">
                          <div class="icon">
                            <span class="ion-ios-arrow-down"></span>
                          </div>
                            <select name="" id="children" class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4+</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="room" class="font-weight-bold text-white">Chambre</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="room" class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4+</option>
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <div class="col-md-6 col-lg-3 align-self-end">
                    <button class="btn btn-primary btn-block text-white">Rechercher</button>
                  </div>
                </div>
              </form>
                      <!-- <input name="ss" placeholder="Where are you going?" data-destination="1" autocomplete="off" aria-autocomplete="list" aria-controls="autocomplete-results" aria-haspopup="listbox" aria-label="Where are you going?" aria-expanded="true" role="combobox" id=":re:" value="">
        <div>
          
<button type="button" data-testid="date-display-field-start"><span>Check-in date</span></button>
<span>-</span>
<button type="button" data-testid="date-display-field-end"><span>Check-out date</span></button>
        </div>
        <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="adults" class="font-weight-bold text-black">Adults</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="" id="adults" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4+</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="children" class="font-weight-bold text-black">Children</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="" id="children" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4+</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
        <input type="text" name="personne" id="personne" placeholder="Combien de personne ?">
        <button type="submit">Rechercher</button>
    </form>
    </div>

    <div class="search-form">
    
 -->
 </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>About Us</h2>
            <p>hello world.</p>
          </div>
          <div class="col-lg-3">
            <h3>Where</h3>
            <p>Au tour du monde</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Hotels</h2>
        </div>
        

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
        <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{asset('TheEvent/assets/img/hotels/3.jpg')}}" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="hotel1">Ghorfa</a></h3>
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
          </div>
          @foreach($offres as $hotel)
          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              @include('hotel', ['hotel' => $hotel])
            <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
            </div>
          </div>
          </div>
         
        @endforeach
              
          </div>
        </div>

        

        </div>
      </div>

    </section><!-- End Hotels Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Consultez notre galerie des hôtels</p>
        </div>
      </div>

      <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><a href="{{asset('imgs/1.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/1.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/2.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/2.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/3.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/3.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/4.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/4.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/5.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/5.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/6.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/6.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/7.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/7.jpg')}}" class="img-fluid" alt=""></a></div>
          <div class="swiper-slide"><a href="{{asset('imgs/8.jpg')}}" class="gallery-lightbox"><img src="{{asset('imgs/8.jpg')}}" class="img-fluid" alt=""></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </section><!-- End Gallery Section -->

   
    <!-- ======= Subscribe Section ======= -->
    <section id="subscribe">
      <div class="container" data-aos="zoom-in">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>hello world</p>
        </div>

        <form method="POST" action="#">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 d-flex">
              <input type="text" class="form-control" placeholder="Enter your Email">
              <button type="submit" class="ms-2">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section><!-- End Subscribe Section -->

    <!-- ======= Buy Ticket Section ======= -->
    <section id="buy-tickets" class="section-with-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Réserver Maintenant</h2>
          <p>Réserver chez HAJZ pour une meilleure expérience</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                <h6 class="card-price text-center">$150</h6>
                <!-- <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr> -->
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Réserver maintenant</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                <h6 class="card-price text-center">$250</h6>
                <!-- <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr> -->
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Réserver maintenant</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                <h6 class="card-price text-center">$350</h6>
                <!-- <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                </ul>
                <hr> -->
                <div class="text-center">
                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access">Réserver maintenant</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reserver</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group mt-3">
                  <select id="ticket-type" name="ticket-type" class="form-select">
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center mt-3">
                  <button type="submit" class="btn">Reserver maintenant</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </section><!-- End Buy Ticket Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>Fès</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+212 5354 8625</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">hajz.hotel@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>
          </div> -->

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <!-- A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br> -->
              <strong>Phone:</strong> +212 5354 8625<br>
              <strong>Email:</strong> hajz.hotel@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>HAJZ</strong>.com™. Tous droits réservés.
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('TheEvent/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('TheEvent/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('TheEvent/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('TheEvent/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('TheEvent/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('TheEvent/assets/js/main.js')}}"></script>

  
</body>

</html>