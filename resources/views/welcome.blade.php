<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Chain App Dev - App Landing Page HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets')}}/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animated.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.css">
    <style>

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
.about-us:after {
  background-image: url('{{asset("assets")}}/images/brand/about-bg.jpg');
  width: 777px;
  height: 1132px;
  content: '';
  position: absolute;
  background-repeat: no-repeat;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  z-index: 0;
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

    </style>
  </head>

<body>



  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="{{asset('assets')}}/images/brand/logo.png" alt="Chain App Dev">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
              <li class="scroll-to-section"><a href="#newsletter">Newsletter</a></li>
              <li><div class="gradient-button"><a id="modal_trigger" href="/register"><i class="fa fa-sign-in-alt"></i> Sign Up Now</a></div></li>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->


</div>

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
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
                    <div class="text-button">
                        <a href="#">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item second-service">
                    <div class="icon"></div>
                    <h4>Rapid Order Processing</h4>
                    <p>Enable quick and accurate order placement directly through the menu system.</p>
                    <div class="text-button">
                        <a href="#">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item third-service">
                    <div class="icon"></div>
                    <h4>Customizable Menus</h4>
                    <p>Tailor your menu to reflect your brand and meet customer preferences.</p>
                    <div class="text-button">
                        <a href="#">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="service-item fourth-service">
                    <div class="icon"></div>
                    <h4>24/7 Support</h4>
                    <p>Our team is here to assist you with any issues, anytime.</p>
                    <div class="text-button">
                        <a href="#">Learn More <i class="fa fa-arrow-right"></i></a>
                    </div>
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
                            <a href="#">Start Your Free Trial</a>
                        </div>
                        <span>*No Credit Card Required</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-image">
                    <img src="{{asset('assets')}}/images/brand/about-right-dec.png" alt="About Quick Menu">
                </div>
            </div>
        </div>
    </div>
</div>


<div id="clients" class="the-clients">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>What Our <em>Clients Say</em> About Our Service</h4>
            <img src="{{asset('assets')}}/images/brand/heading-line-dec.png" alt="">
            <p>Our clients from hotels, restaurants, and coffee shops share their experiences with our solutions. Check out their thoughts below.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-7 align-self-center">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>John Smith</h4>
                            <span class="date">15 December 2024</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Hotel Manager</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">5.0</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Sarah Brown</h4>
                            <span class="date">10 December 2024</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Coffee Shop Owner</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            <span class="rating">4.8</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Michael Johnson</h4>
                            <span class="date">8 December 2024</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Restaurant Manager</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">5.0</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>Emily Davis</h4>
                            <span class="date">5 December 2024</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Hotel Receptionist</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            <span class="rating">4.5</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>James Wilson</h4>
                            <span class="date">1 December 2024</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">Coffee Shop Manager</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 col-12">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="rating">4.9</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="{{asset('assets')}}/images/brand/quote.png" alt="">
                                <p>“John, The services provided by this app have significantly improved our hotel operations. It's user-friendly and efficient!”</p>
                              </div>
                              <div class="down-content">
                                <img src="https://www.findtherightclick.com/wp-content/uploads/2017/07/Matt-T-Testimonial-pic.jpg" alt="">
                                <div class="right-content">
                                  <h4>John Smith</h4>
                                  <span>Hotel Manager</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="client-content">
                                <img src="{{asset('assets')}}/images/brand/quote.png" alt="">
                                <p>“Sarah, Our coffee shop has benefited immensely from the easy-to-use features. Highly recommended!”</p>
                              </div>
                              <div class="down-content">
                                <img src="{{asset('assets')}}/images/brand/client-image.jpg" alt="">
                                <div class="right-content">
                                  <h4>Sarah Brown</h4>
                                  <span>Coffee Shop Owner</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('assets')}}/images/brand/quote.png" alt="">
                                  <p>“Sarah, Our coffee shop has benefited immensely from the easy-to-use features. Highly recommended!”</p>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('assets')}}/images/brand/client-image.jpg" alt="">
                                  <div class="right-content">
                                    <h4>Sarah Brown</h4>
                                    <span>Coffee Shop Owner</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('assets')}}/images/brand/quote.png" alt="">
                                  <p>“Sarah, Our coffee shop has benefited immensely from the easy-to-use features. Highly recommended!”</p>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('assets')}}/images/brand/client-image.jpg" alt="">
                                  <div class="right-content">
                                    <h4>Sarah Brown</h4>
                                    <span>Coffee Shop Owner</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('assets')}}/images/brand/quote.png" alt="">
                                  <p>“Sarah, Our coffee shop has benefited immensely from the easy-to-use features. Highly recommended!”</p>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('assets')}}/images/brand/client-image.jpg" alt="">
                                  <div class="right-content">
                                    <h4>Sarah Brown</h4>
                                    <span>Coffee Shop Owner</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    <!-- Add more client feedbacks as needed -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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
        <div class="col-lg-6 ">
          <div class="footer-widget  mx-5">
            <h4>About Us</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="services">Services</a></li>
              <li><a href="about">About</a></li>
              <li><a href="clients">Testimonials</a></li>
              <li><a href="pricing">Pricing</a></li>
            </ul>

          </div>
        </div>

        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Our Company</h4>
            <div class="logo">
              <img src="{{asset('assets')}}/images/brand/logo.png" alt="">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
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


  <!-- Scripts -->
  <script>
    (function () {
    "use strict";

    // Header Type = Fixed
    window.addEventListener("scroll", function () {
      var scroll = window.scrollY;
      var box = document.querySelector(".header-text").offsetHeight;
      var header = document.querySelector("header").offsetHeight;

      if (scroll >= box - header) {
        document.querySelector("header").classList.add("background-header");
      } else {
        document.querySelector("header").classList.remove("background-header");
      }
    });

    // Owl Carousel Replacement (Simple implementation example)
    var loopElements = document.querySelectorAll(".loop .item");
    var currentLoopIndex = 0;

    function loopCarousel() {
      loopElements.forEach((el, index) => {
        el.style.display = index === currentLoopIndex ? "block" : "none";
      });
      currentLoopIndex = (currentLoopIndex + 1) % loopElements.length;
    }
    setInterval(loopCarousel, 3000);

    // Modal trigger
    var modalTrigger = document.getElementById("modal_trigger");
    if (modalTrigger) {
      modalTrigger.addEventListener("click", function () {
        document.querySelector(".modal").style.display = "block";
      });
    }

    document.querySelectorAll(".modal_close").forEach(function (closeButton) {
      closeButton.addEventListener("click", function () {
        document.querySelector(".modal").style.display = "none";
      });
    });

    // Login/Register Form Toggle
    document.getElementById("login_form")?.addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector(".social_login").style.display = "none";
      document.querySelector(".user_login").style.display = "block";
    });

    document.getElementById("register_form")?.addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector(".social_login").style.display = "none";
      document.querySelector(".user_register").style.display = "block";
      document.querySelector(".header_title").innerText = "Register";
    });

    document.querySelectorAll(".back_btn").forEach(function (backBtn) {
      backBtn.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(".user_login").style.display = "none";
        document.querySelector(".user_register").style.display = "none";
        document.querySelector(".social_login").style.display = "block";
        document.querySelector(".header_title").innerText = "Login";
      });
    });

    // Accordion
    document.addEventListener("click", function (e) {
      if (e.target.matches(".naccs .menu div")) {
        var numberIndex = Array.from(e.target.parentElement.children).indexOf(e.target);

        document.querySelectorAll(".naccs .menu div").forEach(function (el) {
          el.classList.remove("active");
        });
        document.querySelectorAll(".naccs ul li").forEach(function (el) {
          el.classList.remove("active");
        });

        e.target.classList.add("active");
        var activeItem = document.querySelector(`.naccs ul li:nth-child(${numberIndex + 1})`);
        activeItem.classList.add("active");

        var listItemHeight = activeItem.offsetHeight;
        document.querySelector(".naccs ul").style.height = listItemHeight + "px";
      }
    });

    // Menu Dropdown Toggle
    var menuTrigger = document.querySelector(".menu-trigger");
    if (menuTrigger) {
      menuTrigger.addEventListener("click", function () {
        this.classList.toggle("active");
        document.querySelector(".header-area .nav").classList.toggle("show");
      });
    }

    // Smooth Scrolling and Active Link Highlight
    document.querySelectorAll('.scroll-to-section a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();

        document.querySelectorAll(".scroll-to-section a").forEach(function (link) {
          link.classList.remove("active");
        });
        this.classList.add("active");

        var target = document.querySelector(this.getAttribute("href"));
        if (target) {
          window.scrollTo({
            top: target.offsetTop + 1,
            behavior: "smooth",
          });
        }
      });
    });

    function onScroll() {
      var scrollPos = window.scrollY;
      document.querySelectorAll(".nav a").forEach(function (link) {
        var refElement = document.querySelector(link.getAttribute("href"));
        if (refElement && refElement.offsetTop <= scrollPos && refElement.offsetTop + refElement.offsetHeight > scrollPos) {
          document.querySelectorAll(".nav ul li a").forEach(function (el) {
            el.classList.remove("active");
          });
          link.classList.add("active");
        } else {
          link.classList.remove("active");
        }
      });
    }
    document.addEventListener("scroll", onScroll);

    // Page Loading Animation
    window.addEventListener("load", function () {
      document.getElementById("js-preloader").classList.add("loaded");
    });

    // Window Resize Mobile Menu Fix
    function mobileNav() {
      var width = window.innerWidth;
      document.querySelectorAll(".submenu").forEach(function (submenu) {
        submenu.addEventListener("click", function () {
          if (width < 767) {
            document.querySelectorAll(".submenu ul").forEach(function (el) {
              el.classList.remove("active");
            });
            submenu.querySelector("ul").classList.toggle("active");
          }
        });
      });
    }
    mobileNav();
  })();

  </script>
  <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

    <script src="{{asset('vendors')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('vendors')}}/landing-js/owl-carousel.js"></script>
  <script src="{{asset('vendors')}}/landing-js/custom.js"></script>
  <script src="{{asset('vendors')}}/landing-js/animation.js"></script>
  <script src="{{asset('vendors')}}/landing-js/imagesloaded.js"></script>

  <script src="{{asset('vendors')}}/landing-js/popup.js"></script>

</body>
</html>
