
$(".fileUpload").on('change', function () {
    for (let i = 0; i < this.files.length; i++) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image').html('<img src="' + e.target.result + '" alt="Front Image" class="object-fit-cover w-100">');
  
      };
      reader.readAsDataURL(this.files[i]);
    }
  });
  $(".slideshow").slick({
    infinite: true,
    speed: 1000,
    autoplay: true,
    autoplaySpeed: 3000,
    cssEase: 'ease-in-out',
    arrows:false,
    fade:true
  });
  $('.slides-6').slick(
    {
      arrows: false,
      infinite: true,
      speed: 500,
      slidesToShow: 6,
      autoplay: true,
      autoplaySpeed: 1000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 6,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }
  )
  
    $('.slides-3').slick(
    {
      arrows: false,
      infinite: true,
      speed: 800,
      slidesToShow: 3,
      autoplay: true,
      autoplaySpeed: 3000,
      centerMode:true,
      centerPadding: '0',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    }
  );
  //Counter
    (function ($) {
      $.fn.count = function (options) {
        var $this = $(this);
        var countTo = $this.attr('data-count');
        $({ countNum: $this.html() }).animate({
          countNum: countTo
        },
          {
            duration: 1000,
            easing: 'swing',
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
              console.log('done.');
            }
          });
        return this;
      }
    }(jQuery));
  
  //modals
  $(".modal").each(function (l) { $(this).on("show.bs.modal", function (l) { var o = $(this).attr("data-easein"); "shake" == o ? $(".modal-dialog").velocity("callout." + o) : "pulse" == o ? $(".modal-dialog").velocity("callout." + o) : "tada" == o ? $(".modal-dialog").velocity("callout." + o) : "flash" == o ? $(".modal-dialog").velocity("callout." + o) : "bounce" == o ? $(".modal-dialog").velocity("callout." + o) : "swing" == o ? $(".modal-dialog").velocity("callout." + o) : $(".modal-dialog").velocity("transition." + o) }) });
  // makes the parallax elements
  function parallaxIt() {
  
    // create variables
    var $fwindow = $(window);
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  
    // on window scroll event
    $fwindow.on('scroll resize', function () {
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    });
  
    // for each of content parallax element
    $('[data-type="content"]').each(function (index, e) {
      var $contentObj = $(this);
      var fgOffset = parseInt($contentObj.offset().top);
      var yPos;
      var speed = ($contentObj.data('speed') || 1);
  
      $fwindow.on('scroll resize', function () {
        yPos = fgOffset - scrollTop / speed;
  
        $contentObj.css('top', yPos);
      });
    });
  
    // for each of background parallax element
    $('[data-type="background"]').each(function () {
      var $backgroundObj = $(this);
      var bgOffset = parseInt($backgroundObj.offset().top);
      var yPos;
      var coords;
      var speed = ($backgroundObj.data('speed') || 0);
  
      $fwindow.on('scroll resize', function () {
        yPos = - ((scrollTop - bgOffset) / speed);
        coords = '50% -' + yPos + 'px';
  
        $backgroundObj.css({ backgroundPosition: coords });
      });
    });
  
    // triggers winodw scroll for refresh
    $fwindow.trigger('scroll');
  };
  
  parallaxIt();
  // Rippel Effect
  (function (window, $) {
  
    $(function () {
  
      $('.btn').on('mousedown', function (event) {
  
        var $btn = $(this),
          $div = $('<div/>'),
          btnOffset = $btn.offset(),
          xPos = event.pageX - btnOffset.left,
          yPos = event.pageY - btnOffset.top;
  
        $div.addClass('ripple-effect');
        $div
          .css({
            width: '10px',
            height: '10px',
            top: yPos - ($div.height() / 2),
            left: xPos - ($div.width() / 2),
            background: $btn.data("ripple-color") ? $btn.data("ripple-color") : '#FFFFFF99'
          });
        $btn.append($div);
        window.setTimeout(function () {
          $div.remove();
        }, 600);
  
      });
  
    });
  
  })(window, jQuery);
  
  // Sticky Element
  // Custom function which toggles between sticky class (is-sticky)
  var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
    var stickyHeight = sticky.outerHeight();
    var stickyTop = stickyWrapper.offset().top + 5;
    if (scrollElement.scrollTop() >= stickyTop) {
      stickyWrapper.height(stickyHeight);
      sticky.addClass("is-sticky");
    }
    else {
      sticky.removeClass("is-sticky");
      stickyWrapper.height(stickyHeight);
    }
  };
  
  
  
  // Sticky navbar
  // =========================
  $(document).ready(function () {
    // Custom function which toggles between sticky class (is-sticky)
    var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
      var stickyHeight = sticky.outerHeight();
      var stickyTop = stickyWrapper.offset().top;
      if (scrollElement.scrollTop() >= stickyTop) {
        stickyWrapper.height(0);
        sticky.addClass("is-sticky");
      }
      else {
        sticky.removeClass("is-sticky");
        stickyWrapper.height('auto');
      }
    };
  
    // Find all data-toggle="sticky-onscroll" elements
    $('[data-toggle="sticky-onscroll"]').each(function () {
      var sticky = $(this);
      var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
      sticky.before(stickyWrapper);
      sticky.addClass('sticky');
  
      // Scroll & resize events
      $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
        stickyToggle(sticky, stickyWrapper, $(this));
      });
  
      // On page load
      stickyToggle(sticky, stickyWrapper, $(window));
    });
  });
  
  // NAvigation
  
  $(function () {
    setNavigation();
  });
  
  function setNavigation() {
    var path = window.location.href;
    $("nav a").each(function () {
  
      var href = $(this).attr('href');
  
      path = path.substring(0, (path.indexOf("#") == -1) ? path.length : path.indexOf("#"));
      path = path.substring(0, (path.indexOf("?") == -1) ? path.length : path.indexOf("?"));
      if (path === decodeURIComponent(href)) {
        $(this).parent('.nav-item').addClass('active');
      }
      else{
        $(this).parent('.nav-item').removeClass('active');
      }
    });
  
  }