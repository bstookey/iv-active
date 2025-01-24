/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */

// CREATE APP
var APP = (window.APP = window.APP || {});

var debug = true;

function consoleLog(logMessage) {
  if (debug) {
    console.log(logMessage);
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
    consoleLog(ele);
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
    consoleLog("APP.Utilities");
  };

  return {
    init: init,
  };
})();

APP.Banner = (function () {
  var $cookie, $cookieId, $cookieContent, $acceptCookie, $cookieDays;

  var checkCookie = function (cname) {
    var cookieSet = Cookies.get($cookieId) == "true";
    if (!cookieSet) {
      //alert("not accepted");
      $cookieContent.addClass("active");
    }
  };

  var setAlertCookie = function (cname, cvalue, exdays) {
    Cookies.set($cookieId, "true", {
      expires: $cookieDays,
    });
  };

  var hideCookieBar = function () {
    $cookieContent.removeClass("active");
  };

  var initEvents = function () {
    checkCookie($cookieId);
    $acceptCookie.on("touchstart click", function () {
      setAlertCookie();
      hideCookieBar();
      return false;
    });
  };

  var init = function () {
    $cookie = false;
    $cookieContent = $("#announcement-banner");
    if ($cookieContent.length) {
      $acceptCookie = $cookieContent.find("#banner-accept");
      $cookieId =
        $cookieContent.data("id").length != ""
          ? $cookieContent.data("id")
          : "AnnouncementCookieAccept";
      $cookieDays = $cookieContent.data("days");
      initEvents();
    }
    consoleLog("APP.Banner");
  };

  return {
    init: init,
  };
})();

APP.ScrollHeaderFunctions = (function () {
  let $header;
  const scrollFunctions = function () {
    let lastScrollTop = 0;
    const thresh = $header.outerHeight();
    $(window).on("scroll", function (event) {
      const st = $(this).scrollTop();
      if (st > lastScrollTop && lastScrollTop >= thresh) {
        $("body").addClass("headerReady");
        consoleLog("down");
      } else if (st < lastScrollTop && lastScrollTop >= thresh) {
        consoleLog("up");
        $("body").addClass("headerShow");
      } else if (st < lastScrollTop && st <= 1) {
        $("body").removeClass("headerReady");
        $("body").removeClass("headerShow");
      }
      if (st > lastScrollTop) {
        $("body").removeClass("headerShow");
      }
      lastScrollTop = st;
    });

    $(window).on("load", function () {
      let scroll = "";
      clearTimeout(scroll);
      scroll = setTimeout(function () {
        if ($(this).scrollTop() > 0) {
          //alert($(this).scrollTop());
          $(window).scrollTop($(window).scrollTop() + 2);
        }
      }, 1000);
    });
  };

  const init = function () {
    consoleLog("APP.ScrollHeaderFunctions");
    $header = $(".site-header");
    scrollFunctions();
  };

  return {
    init,
  };
})();

APP.CanvasMenu = (function () {
  let $body, $MobMenuContainer, $MobMenuOpen, $menuItemButton;

  var canvasMenu = function () {
    if (!$MobMenuContainer.length) {
      return;
    }

    $MobMenuOpen.on("click", toggleMobMenu);

    $menuItemButton.on("click", function () {
      var $this = $(this);
      if ($this.parent().hasClass("expanded")) {
        closeItems();
      } else {
        closeItems();
        openItem($this);
      }
    });

    $("body").on("keydown", closeOnEscape);
    function closeOnEscape(event) {
      if (event.keyCode === 27) {
        closeMobMenu();
      }
    }
  };

  var toggleMobMenu = function () {
    if ($MobMenuOpen.attr("aria-expanded") === "true") {
      closeMobMenu();
    } else {
      openMobMenu();
    }
  };

  var openMobMenu = function () {
    $MobMenuContainer.addClass("is-visible").attr("aria-hidden", "false");
    $MobMenuOpen.addClass("open").attr("aria-expanded", "true");
    $body.addClass("mobile-menu-open");
  };

  var closeMobMenu = function () {
    $MobMenuContainer.removeClass("is-visible");
    $MobMenuOpen.removeClass("open").attr("aria-expanded", "false");
    $body.removeClass("mobile-menu-open");
    closeItems();
  };

  var openItem = function ($this) {
    $this.parent().addClass("expanded");
  };

  var closeItems = function () {
    $menuItemButton.parent().removeClass("expanded");
  };

  var reszeTimer;
  $(window).on("load resize orientationchange", function (e) {
    clearTimeout(reszeTimer);
    reszeTimer = setTimeout(function () {
      var $resWidth = $(window).innerWidth();
      if ($resWidth >= 992) {
        closeMobMenu();
      }
    }, 500);
  });

  const init = function () {
    $body = $("body");
    $MobMenuContainer = $(".nav-primary.mobile");
    $MobMenuOpen = $(".mobile-menu-open");
    $menuItemButton = $(".menu-item-has-children").find("button");

    canvasMenu();
    consoleLog("APP.CanvasMenu");
  };

  return {
    init,
  };
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
              console.log(xhr.responseJSON); // eslint-disable-line
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

    consoleLog("APP.Load More");
  };
  return {
    init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  APP.Utilities.init();
  APP.Banner.init();
  APP.ScrollHeaderFunctions.init();
  APP.CanvasMenu.init();
  APP.LoadMore.init();
});
