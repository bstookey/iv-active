/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */

// CREATE APP
var APP = (window.APP = window.APP || {});

var debug = false;

function consoleLog(logMessage) {
  if (debug) {
    consoleLog(logMessage);
  }
}

consoleLog("Debug true");

APP.Utilities = (function () {
  const markSup = () => {
    $("body :not(script,sup,iframe)")
      .contents()
      .filter(function () {
        return this.nodeType === 3;
      })
      .replaceWith(function () {
        return this.nodeValue.replace(/[™®†]/g, "<sup>$&</sup>");
      });
  };

  // Improved Text Widow Eliminator using widowadjust.js
  const noWidows = (ele) => {
    wt.fix({
      elements: "p",
      chars: 10,
      method: "nbsp",
      event: "resize",
    });
  };

  var init = function () {
    markSup();
    noWidows("p");
    consoleLog("APP.Utilities Initialized");
  };

  return {
    init: init,
  };
})();

APP.Banner = (function () {
  // Customizer alert banner functions usin cookie.js
  let $body, $cookieContent, $acceptCookie, cookieId, cookieDays;

  const DEFAULT_COOKIE_ID = "AnnouncementCookieAccept";
  const DEFAULT_COOKIE_DAYS = 7;

  if (typeof Cookies !== "undefined") {
    consoleLog("Cookies library is loaded!");
  }

  // Check if the cookie is set
  const checkCookie = () => {
    const cookieSet = Cookies.get(cookieId) === "true";
    if (!cookieSet) {
      $cookieContent.addClass("active");

      consoleLog("No Cookie");
    }
  };

  // Set the cookie to mark the banner as accepted
  const setAlertCookie = () => {
    Cookies.set(cookieId, "true", { expires: cookieDays });
  };

  // Hide the cookie banner
  const hideCookieBar = () => {
    $cookieContent.removeClass("active");
  };

  // Initialize event listeners
  const initEvents = () => {
    checkCookie();

    $acceptCookie.on("click", (e) => {
      e.preventDefault();
      setAlertCookie();
      hideCookieBar();
    });
  };

  // Initialize the banner functionality
  const init = () => {
    $body = $("body");

    // Check if body does not have the class 'logged-in'
    if (!$body.hasClass("customize-partial-edit-shortcuts-shown")) {
      // Do not use the cookie in the customizer.
      $cookieContent = $("#announcement-banner");

      if ($cookieContent.length) {
        $acceptCookie = $cookieContent.find("#banner-accept");
        cookieId = $cookieContent.data("id") || DEFAULT_COOKIE_ID;
        cookieDays = $cookieContent.data("days") || DEFAULT_COOKIE_DAYS;

        checkCookie();
        initEvents();
      }

      consoleLog("APP.Banner Initialized");
    }
  };

  return { init };
})();

APP.ScrollHeaderFunctions = (function () {
  let $header;
  const THRESHOLD = 60;

  // Throttling helper
  const throttle = (func, limit) => {
    let inThrottle;
    return function () {
      const args = arguments;
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  };

  const updateClassesBasedOnScroll = (scrollTop) => {
    if (scrollTop >= THRESHOLD) {
      $("body").addClass("headerReady").removeClass("headerShow");
    } else if (scrollTop > 0 && scrollTop < THRESHOLD) {
      $("body").addClass("headerShow").removeClass("headerReady");
    } else {
      $("body").removeClass("headerReady headerShow");
    }
  };

  const handleScroll = function () {
    let lastScrollTop = 0;

    const onScroll = function () {
      const scrollTop = $(this).scrollTop();

      // Update classes based on scroll position
      updateClassesBasedOnScroll(scrollTop);

      // Keep track of the scroll position for detecting scroll direction
      lastScrollTop = scrollTop;
    };

    $(window).on("scroll", throttle(onScroll, 100));
  };

  const handleLoad = function () {
    $(window).on("load", function () {
      const initialScrollTop = $(window).scrollTop();

      // Update classes based on initial scroll position
      updateClassesBasedOnScroll(initialScrollTop);

      // Trigger a slight scroll adjustment (optional, based on original behavior)
      setTimeout(() => {
        if (initialScrollTop > 0) {
          $(window).scrollTop(initialScrollTop + 2);
        }
      }, 1000);
    });
  };

  const init = function () {
    consoleLog("APP.ScrollHeaderFunctions Initialized");
    $header = $(".site-header");
    handleScroll();
    handleLoad();
  };

  return { init };
})();

APP.CanvasMenu = (function () {
  let $body, $MobMenuContainer, $MobMenuOpen, $menuItemButton;
  let resizeTimer;

  const toggleMobMenu = () => {
    const isExpanded = $MobMenuOpen.attr("aria-expanded") === "true";
    isExpanded ? closeMobMenu() : openMobMenu();
  };

  const openMobMenu = () => {
    $MobMenuContainer.addClass("is-visible").attr("aria-hidden", "false");
    $MobMenuOpen.addClass("open").attr("aria-expanded", "true");
    $body.addClass("mobile-menu-open");
  };

  const closeMobMenu = () => {
    $MobMenuContainer.removeClass("is-visible");
    $MobMenuOpen.removeClass("open").attr("aria-expanded", "false");
    $body.removeClass("mobile-menu-open");
    closeItems();
  };

  const openItem = ($this) => $this.parent().addClass("expanded");

  const closeItems = () => $menuItemButton.parent().removeClass("expanded");

  const closeOnEscape = (event) => {
    if (event.keyCode === 27) closeMobMenu();
  };

  const canvasMenu = () => {
    if (!$MobMenuContainer.length) return;

    $MobMenuOpen.on("click", toggleMobMenu);
    $menuItemButton.on("click", function () {
      const $this = $(this);
      $this.parent().hasClass("expanded")
        ? closeItems()
        : (closeItems(), openItem($this));
    });

    $("body").on("keydown", closeOnEscape);
  };

  // Handle window resize and orientation change
  $(window).on("load resize orientationchange", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      if ($(window).innerWidth() >= 992) closeMobMenu();
    }, 500);
  });

  const init = () => {
    $body = $("body");
    $MobMenuContainer = $(".nav-primary.mobile");
    $MobMenuOpen = $(".mobile-menu-open");
    $menuItemButton = $(".menu-item-has-children").find("button");

    canvasMenu();
    consoleLog("APP.CanvasMenu Initialized");
  };

  return { init };
})();

APP.LoadMore = (function () {
  var loadMore = function () {
    $(".view-more-query").on("click", function (e) {
      e.preventDefault();

      const self = $(this);
      const queryEl = $(this).closest(".wp-block-query");
      const postTemplateEl = queryEl.find(".wp-block-post-template");

      if (queryEl.length && postTemplateEl.length) {
        const block = JSON.parse(queryEl.attr("data-attrs"));
        const maxPages = block.attrs.query.pages || 0;

        /* eslint-disable */
        $.ajax({
          url: i18n.ajax_url,
          dataType: "json html",
          data: {
            action: "query_render_more_pagination",
            attrs: queryEl.attr("data-attrs"),
            paged: queryEl.attr("data-paged"),
          },
          complete(xhr) {
            const nextPage = Number(queryEl.attr("data-paged")) + 1;

            if (maxPages > 0 && nextPage >= maxPages) {
              self.remove();
            }

            queryEl.attr("data-paged", nextPage);

            if (xhr.responseJSON) {
              consoleLog(xhr.responseJSON); // eslint-disable-line
            } else {
              const htmlEl = $(xhr.responseText);

              if (htmlEl.length) {
                const html =
                  htmlEl.find(".wp-block-post-template").html() || "";

                if (html.length) {
                  postTemplateEl.append(html);
                  return;
                }
              }

              self.remove();
            }
          },
        });
        /* eslint-enable */
      }
    });
  };

  const init = function () {
    loadMore();

    consoleLog("APP.Load More Initialized");
  };
  return {
    init,
  };
})();

APP.Form = (function () {
  var $submit, tylocation;

  var actionEvents = function () {
    document.addEventListener(
      "wpcf7submit",
      function (event) {
        //consoleLog(event.detail.inputs);
        $.each(event.detail.inputs, function (i, input) {
          if (input.name == "list-services[]" || input.name == "isprovider") {
            tylocation = "/thank-you/";
            // return false;
          }
        });
        sendToHubSpot(tylocation);
      },
      false
    );
  };

  var sendToHubSpot = function (loc) {
    //consoleLog(loc);
    $.ajax({
      type: "POST",
      url: "/iv-active/wp-content/themes/iv-active/integrations/add-signup.php",
      data: $("form").serialize(),
      datatype: "json",
      success: function () {
        //consoleLog("Contact Added To HubSpot");
        location = loc;
      },
      error: function (xhr, textStatus, errorThrown) {
        //consoleLog(errorThrown);
      },
    });
  };

  var init = function () {
    $submit = $(".contact-form .wpcf7-submit");
    tylocation = "/contact-thank-you";
    actionEvents();
    consoleLog("APP.Form Initialized");
  };

  return {
    init: init,
  };
})();

APP.Carousel = (function () {
  var $carousel, $carouselInner, $carouselItem;

  var carouselHeight = function () {
    $carousel.each(function () {
      var items = $(this).find(".carousel-item");
      // Temporarily show all items to measure their heights
      items.css({
        display: "block",
        visibility: "hidden",
      });

      // Calculate the maximum height
      var maxHeight = Math.max.apply(
        null,
        items
          .map(function () {
            return $(this).outerHeight();
          })
          .get()
      );

      // Reset items back to their original styles
      items.css({
        display: "",
        visibility: "",
      });

      // Set the min-height for consistency
      items.css("min-height", maxHeight + "px");
      $(this)
        .find(".iv-carousel-item")
        .css("min-height", maxHeight + "px");
    });
  };

  var setCarousel = function (interval = 1000) {
    $carousel.carousel({
      interval: interval,
      pause: "hover",
      //ride: "carousel",
    });

    $carouselItem.first().addClass("active");
    $(".carousel-indicators > button:first").addClass("active");
    setTimeout(function () {
      $carousel.parent().addClass("alive");
    }, 500);
  };

  var touchswipe = function () {
    const swpele = $(".carousel");
    swpele.swipe({
      fingers: "all",
      swipeLeft: swipe1,
      swipeRight: swipe1,
      swipeUp: swipe1,
      swipeDown: swipe1,
      allowPageScroll: "vertical",
    });

    function swipe1(
      event,
      direction,
      distance,
      duration,
      fingerCount,
      fingerData
    ) {
      //alert("You swiped " + direction );
      if (direction === "left") {
        $(this).carousel("next");
      }
      if (direction === "right") {
        $(this).carousel("prev");
      }
      if (direction === "up") {
        $(this).carousel("next");
      }
      if (direction === "down") {
        $(this).carousel("prev");
      }
    }
  };

  var handleResize = function () {
    var resTimer;
    $(window).on("resize orientationchange", function () {
      consoleLog("resize");
      clearTimeout(resTimer);
      resTimer = setTimeout(function () {
        $carouselItem.css("min-height", ""); // Reset height
        $carouselItem.find(".iv-carousel-item").css("min-height", ""); // Reset height
        carouselHeight(); // Recalculate heights
      }, 500);
    });
  };

  var init = function () {
    consoleLog("APP.Carousel");

    $carousel = $(".vertical-carousel.carousel");
    $carouselInner = $carousel.find(".carousel-inner");
    $carouselItem = $carousel.find(".carousel-item");

    if ($carousel.length) {
      // First, calculate and set the heights of the items
      carouselHeight();

      // Then, initialize the carousel
      setCarousel(5000);

      // Enable touch swipe
      touchswipe();

      // Handle resize properly
      handleResize();
    }
  };

  return {
    init: init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  APP.Utilities.init();
  APP.Banner.init();
  APP.ScrollHeaderFunctions.init();
  APP.CanvasMenu.init();
  APP.LoadMore.init();
  APP.Form.init();
  APP.Carousel.init();
});
