<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/icon.png')}}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Quick Menu - Streamline your dining experience with an intuitive, fast, and mobile-friendly menu system.">
    <meta name="keywords" content="Quick Menu, Online Menu, Restaurant Menu, QR Code Menu , Digital Menu, order prosess, order now , simple menu ,">
    <meta name="author" content="Quick Menu">
    <link rel="canonical" href="https://quick-menu.infy.uk">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Quick Menu - Fast and Mobile-Friendly Menus">
    <meta property="og:description" content="Streamline your dining experience with Quick Menu.">
    <meta property="og:url" content="https://quick-menu.infy.uk">
    <meta property="og:type" content="website">

    <!-- Preconnect for Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Toastr and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />

    <title>Quick Menu </title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets')}}/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animated.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.css">
    <style>


@media (max-width: 767px) {


  .header-area .main-nav .nav {
    float: none;
    width: 100%;
    height: 100vh;
    display: none; /* Hidden by default */
    opacity: 0; /* Start invisible */
    transform: translateY(-20px); /* Slide in from above */
    transition: all 0.3s ease-in-out; /* Smooth transition */
    margin-left: 0px;
  }

  .header-area .main-nav .nav.show {
    background: #fff;
    display: block;
    position: absolute;
    top: 60px; /* Adjust based on header height */
        right: 10px;
        z-index: 1000;
    opacity: 1; /* Fully visible */
    transform: translateY(0); /* Reset position */
  }
  .header-area .main-nav .nav.show li a {
    border: none !important;
  }
  .background-header  .nav.show a.active::after{
    background-color: transparent !important;
  }

  .header-area .main-nav .nav li {
    width: 100%;
    background: #fff;
    border-bottom: 1px solid #e7e7e7;
    text-align: center;
    padding-left: 0px !important;
    padding-right: 0px !important;
  }

  .header-area .main-nav .nav li a {
    height: 50px !important;
    line-height: 50px !important;
    padding: 0px !important;
    border: none !important;
    background: #f7f7f7 !important;
    color: #191a20 !important;
    transition: all 0.2s ease-in-out; /* Add hover effect */
  }

  .header-area .main-nav .nav li a:hover {
    background: #eee !important;
    color: #4b8ef1 !important;
  }
  .gradient-button {
    display: block !important;
  }
  .header-area .menu-trigger {
    display: block !important;
    cursor: pointer;
  }
  .right-image{
    display: none !important;
  }
}
.nav-link-custom:hover{
    color: #191a20!important;
}
.background-header .main-nav .nav .nav-link-custom:hover a {
    color: #010407;
}
.header-area .main-nav .nav .nav-link-custom:hover a, .header-area .main-nav .nav .nav-link-custom a.active{
    color: #010407!important;
}

.logo{
    width: 10rem;
    margin-left: 5px;
}
.main-banner:after {
    content: '';
    background-image: url('{{asset('assets')}}/images/brand/slider-left-dec.png');
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.services:after {
  content: '';
  background-image: url('{{asset('assets')}}/images/services-left-dec.png');
  background-repeat: no-repeat;
  position: absolute;
  left: 0;
  bottom: -300px;
  width: 261px;
  height: 368px;
  z-index: 0;
}

.services:before {
  content: '';
  background-image: url('{{asset('assets')}}/images/brand/services-right-dec.png');
  background-repeat: no-repeat;
  position: absolute;
  right: 0;
  top: 0;
  width: 1136px;
  height: 244px;
  z-index: 0;
}
.first-service .icon {
  background-image:url('{{asset('assets')}}/images/brand/service-icon-01.png');
}

.first-service:hover .icon {
  background-image: url('{{asset('assets')}}/images/brand/service-icon-hover-01.png');
}

.second-service .icon {
  background-image: url('{{asset('assets')}}/images/brand/service-icon-02.png');
}

.second-service:hover .icon {
  background-image:url('{{asset('assets')}}/images/brand/service-icon-hover-02.png');
}


.third-service .icon {
  background-image: url('{{asset('assets')}}/images/brand/service-icon-03.png');
}

.third-service:hover .icon {
  background-image: url('{{asset('assets')}}/images/brand/service-icon-hover-03.png');
}

.fourth-service .icon {
  background-image: url('{{asset("assets")}}/images/brand/service-icon-04.png');
}

.fourth-service:hover .icon {
  background-image: url('{{asset("assets")}}/images/brand/service-icon-hover-04.png');
}

.service-item:hover {
  background-image: url('{{asset("assets")}}/images/brand/service-bg.jpg');
  background-position: right top;
  background-repeat: no-repeat;
  background-size: cover;
}


.the-clients .nacc .thumb .client-content {
  padding: 60px 30px;
  background-image: url('{{asset("assets")}}/images/brand/client-bg.png');
  background-size: cover;
  border-radius: 50px;
  width: 100%;
  height: auto;
  background-repeat: no-repeat;
}.pricing-item-regular:before {
  position: absolute;
  top: 0;
  left: 0;
  background-image:url('{{asset("assets")}}/images/brand/regular-table-top.png');
  z-index: 0;
  content: '';
  width: 274px;
  height: 221px;
}

.pricing-item-regular:after {
  position: absolute;
  bottom: 0;
  right: 0;
  background-image: url('{{asset("assets")}}/images/brand/regular-table-bottom.png');
  z-index: 0;
  content: '';
  width: 370px;
  height: 171px;
}
.pricing-item-pro:before {
  position: absolute;
  top: 0;
  left: 0;
  background-image:url('{{asset("assets")}}/images/brand/pro-table-top.png');
  z-index: 0;
  content: '';
  width: 281px;
  height: 251px;
}

.pricing-item-pro:after {
  position: absolute;
  bottom: 0;
  right: 0;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url('{{asset("assets")}}/images/brand/pro-table-bottom.png');
  z-index: 0;
  content: '';
  width: 100%;
  height: 201px;
}.free-quote {
  background-image: url('{{asset("assets")}}/images/brand/quote-bg.jpg');
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  padding: 120px 0px;
  text-align: center;
  position: relative;
  z-index: 2;
  margin-top: 130px;
}
footer {
  background-image: url('{{asset("assets")}}/images/brand/footer-bg.png');
  background-position: center top;
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: 130px;
  padding-top: 300px;
  padding-bottom: 60px;
}
.toast {
opacity: 1 !important;
z-index: 9999; /* Ensure it appears above other elements */
}
.toast-success {
    background-color: #1d9f3c !important; /* Light green */
    color: #dfe0df !important; /* Dark green text */
}

    </style>
  </head>

<body>



    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route('home')}}" class="logo">
                            <img class="mx-5" src="{{asset('assets')}}/images/brand/logo.png" alt="Chain App Dev">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>

                            @if (auth()->check())
                            <li class="nav-link-custom">
                                <div class="nav-item dropdown" style="color:#191a20">
                                    <a class="nav-link dropdown-toggle" style="color:#191a20" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" style="color:#191a20" aria-labelledby="userMenu">
                                        @if(auth()->user()?->subscriptions)
                                            <li>
                                                <a class="dropdown-item" href="/dashboard">
                                                    <i class="fa fa-tachometer-alt"></i> Dashboard
                                                </a>
                                            </li>
                                        @endif
                                        <li class="logout">
                                            @livewire('logout-button')
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @else
                                <li>


                                        <a class="gradient-button " href="/register">
                                            <i class="fa fa-sign-in-alt"></i> Sign Up Now
                                        </a>
                                </li>

                            @endif
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>






<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="menu-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Streamline Your Restaurant's Ordering</h2>
                                    <p>Our Quick Menu System simplifies your ordering process with digital menus and QR code integration for seamless customer experiences.</p>
                                </div>
                                <div class="col-lg-12">
                                    <div class="white-button first-button scroll-to-section">
                                        <a href="#pricing">Get Started </a>
                                    </div>
                                    <div class="white-button scroll-to-section">
                                        <a href="#services">Learn More <i class=""></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="{{asset('assets')}}/images/brand/slider-dec.png" alt="Quick Menu System">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="services" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h4>Exceptional <em>Features &amp; Benefits</em> for You</h4>
                    <img src="{{asset('assets')}}/images/brand/heading-line-dec.png" alt="">
                    <p>Explore how our system revolutionizes restaurant management by enabling efficient, customer-friendly menu navigation and ordering.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="service-item first-service">
                    <div class="icon"></div>
                    <h4>Easy Maintenance</h4>
                    <p>Effortlessly update and manage your digital menus anytime, anywhere.</p>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item second-service">
                    <div class="icon"></div>
                    <h4>Rapid Order Processing</h4>
                    <p>Enable quick and accurate order placement directly through the menu system.</p>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item third-service">
                    <div class="icon"></div>
                    <h4>Customizable Menus</h4>
                    <p>Tailor your menu to reflect your brand and meet customer preferences.</p>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item fourth-service">
                    <div class="icon"></div>
                    <h4>24/7 Support</h4>
                    <p>Our team is here to assist you with any issues, anytime.</p>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="about" class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="section-heading">
                    <h4>About <em>Our Quick Menu System</em></h4>
                    <img src="{{asset('assets')}}/images/brand/heading-line-dec.png" alt="">
                    <p>Our solution transforms the way you manage and present your restaurant’s menu, empowering you to focus on delivering exceptional customer service.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Effortless Management</a></h4>
                            <p>Manage your menus in real-time with minimal effort.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Enhanced Customer Experience</a></h4>
                            <p>Ensure smooth and satisfying interactions for your guests.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Real-Time Updates</a></h4>
                            <p>Stay current with instant menu changes and updates.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-item">
                            <h4><a href="#">Insights & Analytics</a></h4>
                            <p>Gain valuable insights to improve your service and offerings.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p>Take the first step towards redefining your restaurant experience with our innovative solution.</p>
                        <div class="gradient-button">
                            <a href="#pricing">Subscribe Now</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-image">
                    <img  src="{{asset('assets')}}/images/brand/about-right-dec.png" alt="About Quick Menu">
                </div>
            </div>
        </div>
    </div>
</div>


<div id="testimonials" class="testimonial-section py-5  z-3">
    <div class="container w-100">
      <div class="text-center mb-4">
        <h2 class="section-title">What Our Clients Say</h2>
        <p class="section-description">Discover the experiences shared by our clients from hotels, restaurants, and coffee shops.</p>
      </div>
      <div class="testimonial-slider">
        <div class="testimonial-card">
          <div class="card-header">
            <img class="client-photo" src="https://www.findtherightclick.com/wp-content/uploads/2017/07/Matt-T-Testimonial-pic.jpg" alt="John Smith">
            <div class="client-info">
              <h4 class="client-name">John Smith</h4>
              <span class="client-role">Hotel Manager</span>
              <span class="testimonial-date">15 December 2024</span>
            </div>
          </div>
          <div class="card-body">
            <p class="testimonial-text">“The services provided by this app have significantly improved our hotel operations. It's user-friendly and efficient!”</p>
          </div>
          <div class="card-footer">
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="card-header">
            <img class="client-photo" src="{{asset('assets')}}/images/brand/client-image.jpg" alt="Sarah Brown">
            <div class="client-info">
              <h4 class="client-name">Sarah Brown</h4>
              <span class="client-role">Coffee Shop Owner</span>
              <span class="testimonial-date">10 December 2024</span>
            </div>
          </div>
          <div class="card-body">
            <p class="testimonial-text">“Our coffee shop has benefited immensely from the easy-to-use features. Highly recommended!”</p>
          </div>
          <div class="card-footer">
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half"></i>
              <span>4.8</span>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="card-header">
            <img class="client-photo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTuvr0Qx7UlGx5-rOR2nN2XO1JwBFk6gc2fA&s" alt="Michael Johnson">
            <div class="client-info">
              <h4 class="client-name">Michael Johnson</h4>
              <span class="client-role">Restaurant Manager</span>
              <span class="testimonial-date">8 December 2024</span>
            </div>
          </div>
          <div class="card-body">
            <p class="testimonial-text">“The app has transformed how we manage our restaurant. It’s reliable and easy to integrate into our workflow.”</p>
          </div>
          <div class="card-footer">
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <span>5.0</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="how-it-works" class="how-it-works">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="section-heading">
            <h4>How This <em> Work?</em></h4>
            <img src="{{asset('assets')}}/images/brand/heading-line-dec.png" alt="">

            <p>Watch the video below to understand how our service operates.</p>
          </div>
        </div>
        <div class="col-lg-12 mt-3">
          <div class="video-wrapper text-center">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/F9HjkWyh7Rw?si=tTRNR-hTvCr7SQB2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>          </div>
        </div>
      </div>
    </div>
  </section>


  <div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>We Have The Best Subscription <em>Prices</em> You Can Get</h4>
            <img src="{{asset('assets')}}/images/brand/heading-line-dec.png" alt="">

          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">$20</span>
            <h4>Monthly</h4>
            <div class="icon">
              <img src="{{asset('assets')}}/images/brand/pricing-table-01.png" alt="">
            </div>
            <ul>

            </ul>
            <div class="border-button">
              <a href="{{ route('checkout', ['plan' => 'price_1QNvE8GOhthvA09P5s5Q21kF']) }}">Purchase This Plan Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-pro">
            <span class="price">$55</span>
            <h4>3 Months</h4>
            <div class="icon">
              <img src="{{asset('assets')}}/images/brand/pricing-table-01.png" alt="">
            </div>
            <ul>

            </ul>
            <div class="border-button">
              <a href="{{ route('checkout', ['plan' => 'price_1QO03IGOhthvA09PBmgFNTXO']) }}">Purchase This Plan Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="pricing-item-regular">
            <span class="price">$155</span>
            <h4>Yearly</h4>
            <div class="icon">
              <img src="{{asset('assets')}}/images/brand/pricing-table-01.png" alt="">
            </div>
            <ul>

            </ul>
            <div class="border-button">
              <a href="{{ route('checkout', ['plan' => 'price_1QO03IGOhthvA09PCHEPeFcs']) }}">Purchase This Plan Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Join our mailing list to receive the news &amp; latest trends</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
          <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <input type="address" name="address" class="email" placeholder="Email Address..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <button type="submit" class="main-button">Subscribe Now <i class="fa fa-angle-right"></i></button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Contact Us</h4>
            <p>Amman , Jordan</p>
            <p><a href="#">0788136963</a></p>
            <p><a href="mailto:shadisaad911@gmail.com">shadisaad911@gmail.com</a></p>
          </div>
        </div>
        <div class="col-lg-6 " >
          <div class="footer-widget  mx-5">
            <h4>About Us</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#testimonials">Testimonials</a></li>
              <li><a href="#pricing">Pricing</a></li>
            </ul>

          </div>
        </div>

        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Our Company</h4>
            <div class="logo">
              <img src="{{asset('assets')}}/images/brand/logo.png" alt="">
            </div>
            <p>Our Quick Menu System simplifies your ordering process with digital menus and QR code integration for seamless customer experiences.

            </p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2025 Quick Menu. All Rights Reserved.
          </div>
        </div>
      </div>
    </div>
  </footer>

  @if(session('success'))
  <script>
      toastr.success("{{ session('success') }}");
  </script>
    @endif
    @if(session('subscription_success'))
    <script>
        toastr.success("Subscription created successfully! You can go to your dashboard now By Clicking in your name in the top of the page.");
    </script>
      @endif


  <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="{{asset('assets/vendors')}}/landing-js/custom.js"></script>
  <script src="{{asset('assets/vendors')}}/landing-js/animation.js"></script>
  <script src="{{asset('assets/vendors')}}/landing-js/imagesloaded.js"></script>
  <script src="{{asset('assets/vendors')}}/landing-js/popup.js"></script>
  <script src="{{asset('assets/vendors')}}/landing-js/owl-carousel.js"></script>

<script>


</script>
  <!-- Scripts -->
  <script>

  </script>



</body>
</html>
