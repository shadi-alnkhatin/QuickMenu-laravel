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
        document.querySelector(".menu-overlay").classList.toggle("active");
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

