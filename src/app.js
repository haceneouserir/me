import AOS from "aos";

// Initialize AOS
AOS.init();

// This code converted from JQuery to JS vanilla using chatGPT
document.addEventListener("DOMContentLoaded", () => {
  const root = document.documentElement;
  const themeKey = "hs_theme";
  const btnDark = document.getElementById("btnDark");
  const btnLight = document.getElementById("btnLight");
  const drawerToggle = document.getElementById("drawerToggle");
  const sidebar = document.querySelector("aside");
  const drawerToggleIcon = document.querySelector('label[for="drawerToggle"]');
  const backToTop = document.getElementById("backToTop");
  const showAfter = 200;

  const applyTheme = (mode, persist = true) => {
    const isDark = mode === "dark";
    root.classList.toggle("dark", isDark);
    btnDark.classList.toggle("hidden", isDark);
    btnLight.classList.toggle("hidden", !isDark);
    if (persist) localStorage.setItem(themeKey, mode);
  };

  // Initial sync with saved preference
  const isDarkNow = root.classList.contains("dark");
  applyTheme(isDarkNow ? "dark" : "light", false);

  // Theme toggles
  btnDark?.addEventListener("click", () => applyTheme("dark"));
  btnLight?.addEventListener("click", () => applyTheme("light"));

  // Respond to system theme if no preference saved
  const mq = window.matchMedia("(prefers-color-scheme: dark)");
  mq.addEventListener("change", (event) => {
    if (!localStorage.getItem(themeKey)) {
      applyTheme(event.matches ? "dark" : "light", false);
    }
  });

  // Hide sidebar when clicking outside
  document.addEventListener("mousedown", (event) => {
    if (
      drawerToggle.checked &&
      !sidebar.contains(event.target) &&
      event.target !== drawerToggle &&
      !drawerToggleIcon.contains(event.target)
    ) {
      event.preventDefault();
      drawerToggle.checked = false;
    }
  });

  // Prevent scroll-to-top when clicking drawer label
  drawerToggleIcon?.addEventListener("click", (event) => {
    event.preventDefault();
    drawerToggle.checked = !drawerToggle.checked;
  });

  // Highlight current section on scroll
  const sections = document.querySelectorAll("section[id]");
  const links = document.querySelectorAll(".sidebar-link");

  const onScroll = () => {
    const scrollTop = window.scrollY;
    let currentId = null;

    sections.forEach((sec) => {
      const id = sec.id;
      const top = sec.offsetTop;
      const bottom = top + sec.offsetHeight;

      if (
        (id !== "contactMe" && scrollTop >= top && scrollTop < bottom) ||
        (id === "contactMe" &&
          scrollTop + window.innerHeight >= bottom)
      ) {
        currentId = id;
      }
    });

    // Reset all links
    links.forEach((link) => {
      link.classList.remove(
        "bg-capri",
        "text-gray-800",
        "dark:text-gray-200",
        "hover:bg-capri-light"
      );
      link.classList.add(
        "text-gray-700",
        "hover:bg-gray-100",
        "dark:text-gray-400",
        "dark:hover:bg-gray-800"
      );
    });

    // Highlight current link
    if (currentId) {
      const activeLink = document.querySelector(
        `.sidebar-link[href="#${currentId}"]`
      );
      activeLink?.classList.remove(
        "text-gray-700",
        "hover:bg-gray-100",
        "dark:text-gray-400",
        "dark:hover:bg-gray-800"
      );
      activeLink?.classList.add(
        "bg-capri",
        "text-gray-800",
        "dark:text-gray-200",
        "hover:bg-capri-light"
      );
    }

    // Show/hide back-to-top
    if (scrollTop > showAfter) {
      backToTop?.classList.remove("hidden");
      backToTop?.classList.add("opacity-100");
    } else {
      backToTop?.classList.add("hidden");
      backToTop?.classList.remove("opacity-100");
    }
  };

  window.addEventListener("scroll", onScroll);
  onScroll(); // trigger initially

  // Re-run scroll handler when clicking a sidebar link
  document.querySelectorAll(".sidebar-link").forEach((link) => {
    link.addEventListener("click", () => {
      setTimeout(onScroll, 10);
    });
  });

  // Smooth scroll back-to-top
  backToTop?.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  // Contact form submit
  const contactForm = document.getElementById("contactForm");
  contactForm?.addEventListener("submit", async (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const sendMailBtn = document.getElementById("sendMail");
    sendMailBtn.disabled = true;
    sendMailBtn.textContent = "Sending...";

    const initialUrl = 'mail.php';
    const url = initialUrl.split(/[?#]/)[0];
    const formData = new FormData(form);

    try {
      const response = await fetch(url, {
        method: "POST",
        body: formData,
      });
      const res = await response.json();

      const fields = ["name", "email", "subject", "message"];
      if (res.errors) {
        fields.forEach((f) => {
          const err = form.querySelector(`.${f}-field .validation-err`);
          if (res.errors[f]) {
            err?.classList.remove("hidden");
            err.textContent = res.errors[f];
          } else {
            err?.classList.add("hidden");
            err.textContent = "";
          }
        });
      } else if (res.success) {
        document.querySelectorAll(".validation-err").forEach((el) =>
          el.classList.add("hidden")
        );
        document.querySelectorAll(".error-icon").forEach((el) =>
          el.classList.add("hidden")
        );
        document.querySelectorAll(".success-icon").forEach((el) =>
          el.classList.remove("hidden")
        );
        const alertMsg = document.querySelector(".alert-msg");
        alertMsg?.classList.remove("hidden", "bg-red-400");
        alertMsg?.classList.add("bg-green-400");
        document.querySelector(".alert-msg-text").textContent = res.message;

        setTimeout(() => alertMsg?.classList.add("hidden"), 5000);
        form.reset();
      } else {
        const alertMsg = document.querySelector(".alert-msg");
        document.querySelectorAll(".validation-err").forEach((el) =>
          el.classList.add("hidden")
        );
        document.querySelectorAll(".success-icon").forEach((el) =>
          el.classList.add("hidden")
        );
        document.querySelectorAll(".error-icon").forEach((el) =>
          el.classList.remove("hidden")
        );
        alertMsg?.classList.remove("hidden", "bg-green-400");
        alertMsg?.classList.add("bg-red-400");
        document.querySelector(".alert-msg-text").textContent = res.message;
        setTimeout(() => alertMsg?.classList.add("hidden"), 5000);
      }
    } catch (error) {
      // console.error("AJAX request failed:", error);
      const alertMsg = document.querySelector(".alert-msg");
      alertMsg?.classList.remove("hidden");
      alertMsg?.classList.add("bg-red-400");
      document.querySelector(".alert-msg-text").textContent =
        "Something went wrong, please try again later!";
      setTimeout(() => alertMsg?.classList.add("hidden"), 5000);
    } finally {
      sendMailBtn.disabled = false;
      sendMailBtn.textContent = "Send Message";
    }
  });

  // Close alert
  document.querySelectorAll(".alert-msg-close").forEach((btn) => {
    btn.addEventListener("click", (event) => {
      event.preventDefault();
      document.querySelector(".alert-msg")?.classList.add("hidden");
    });
  });
});

// // Hide the sidebar when clicking outside it
// $(() => {
//   const $root = document.documentElement;
//   const $THEME_KEY = 'hs_theme';
//   const $btnDark = $('#btnDark');   // click -> switch to dark
//   const $btnLight = $('#btnLight');  // click -> switch to light
//   const $drawerToggle = $("#drawerToggle");
//   const $sidebar = $("aside");
//   const $drawerToggleIcon = $('label[for="drawerToggle"]');
//   const $backToTop = $('#backToTop');
//   const $SHOW_AFTER = 200; // px scrolled down before showing button

//   const applyTheme = ($mode, $persist = true) => {
//     const $isDark = $mode === 'dark';
//     $($root).toggleClass('dark', $isDark);
//     $($btnDark).toggleClass('hidden', $isDark);
//     $($btnLight).toggleClass('hidden', !$isDark);
//     if ($persist) localStorage.setItem($THEME_KEY, $mode);
//   }

//   // Initial: sync buttons to current class (head script already set the class)
//   const $isDarkNow = $($root).hasClass('dark');
//   applyTheme($isDarkNow ? 'dark' : 'light', false);

//   // Click handlers
//   $btnDark.on('click', () => applyTheme('dark'));
//   $btnLight.on('click', () => applyTheme('light'));

//   // Optional: respond to system changes only if no saved preference
//   const $mq = window.matchMedia('(prefers-color-scheme: dark)');
//   $mq.addEventListener?.('change', (event) => {
//     if (!localStorage.getItem($THEME_KEY)) applyTheme(event.matches ? 'dark' : 'light', false);
//   });

//   $(document).on("mousedown", (event) => {
//     // Only prevent default if actually closing the sidebar, not on every click
//     if (
//       $drawerToggle.is(":checked") &&
//       !$(event.target).closest($sidebar).length &&
//       !$(event.target).is($drawerToggle) &&
//       !$(event.target).closest($drawerToggleIcon).length
//     ) {
//       event.preventDefault();
//       $drawerToggle.prop("checked", false);
//     }
//   });

//   // Prevent scroll-to-top when clicking the sidebar toggle button (label)
//   $drawerToggleIcon.on("click", (event) => {
//     event.preventDefault();
//     // Toggle the checkbox manually
//     $drawerToggle.prop("checked", !$drawerToggle.prop("checked"));
//   });

//   // Highlight the current section in the sidebar on scroll
//   const $sections = $("section[id]");
//   const $links = $(".sidebar-link");

//   $(window).on("scroll",  () => {
//     const scrollTop = $(window).scrollTop();
//     let $currentId = null;

//     $sections.each((index, el) => {
//       const $sec = $(el);
//       const $id = el.id;
//       const $top = $sec.offset().top;
//       const $bottom = $top + $sec.outerHeight();

//       if (
//         // for normal sections trigger when top hits viewport top
//         // for contactMe trigger when its bottom edge reaches the viewport bottom
//         ($id !== "contactMe" && scrollTop >= $top && scrollTop < $bottom) ||
//         ($id === "contactMe" && scrollTop + $(window).height() >= $bottom)
//       ) {
//         $currentId = $id;
//         return false;
//       }
//     });

//     // reset all links
//     $links
//       .removeClass("bg-capri text-gray-800 dark:text-gray-200 hover:bg-capri-light")
//       .addClass("text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800")

//     // highlight the one matching currentId
//     if ($currentId) {
//       $links
//         .filter('[href="#' + $currentId + '"]')
//         .removeClass("text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800")
//         .addClass("bg-capri text-gray-800 dark:text-gray-200 hover:bg-capri-light");
//     }

//     // Show/hide the back-to-top button based on scroll position
//     if ($(window).scrollTop() > $SHOW_AFTER) {
//       $backToTop.removeClass('hidden').addClass('opacity-100');
//     } else {
//       $backToTop.addClass('hidden').removeClass('opacity-100');
//     }
//   });

//   // trigger on load in case you’re already scrolled down
//   $(window).trigger("scroll");

//   // re-run the scroll handler whenever you click a sidebar link
//   $(".sidebar-link").on("click",  () => {
//     // small timeout to let the browser actually jump
//     setTimeout(() => $(window).trigger("scroll"), 10);
//   });

//   $backToTop.on('click',  () => {
//     $('html, body').animate({ scrollTop: 0 }, 200);
//   })

//   // Initialize AOS (Animate On Scroll)
//   AOS.init();

//   // Send mail
//   $('#contactForm').on('submit', (event) => {
//     event.preventDefault();
//     const $form = $(event.currentTarget);
//     const $sendMailBtn = $('#sendMail');
//     $sendMailBtn.prop('disabled', true).text('Sending...');
//     const $initialUrl = 'mail.php?name="Hacene"'; // Use a relative URL for the AJAX request
//     let $url =  $initialUrl.split(/[?#]/)[0];

//     console.log($form.serialize())
//     $.ajax({
//       url: $url,
//       method: 'POST',
//       data: $form.serialize(),
//       dataType: 'json'
//     }).done(function (res) {
//       const fields = ['name', 'email', 'subject', 'message'];
//       if (res.errors) {
//         // Show only current errors, hide cleared ones
//         fields.forEach(f => {
//           const $err = $form.find(`.${f}-field .validation-err`);
//           if (res.errors[f]) {
//             $err.removeClass('hidden').text(res.errors[f]);
//           } else {
//             $err.addClass('hidden').text('');
//           }
//         });
//       }
//       else if (res.success) {
//         // Hide all errors, show success message
//         $(".validation-err").addClass("hidden");
//         $(".error-icon").addClass("hidden");
//         $(".success-icon").removeClass("hidden");
//         $(".alert-msg").removeClass("hidden bg-red-400").addClass("bg-green-400");
//         $(".alert-msg-text").text(res.message);
//          alertTimer = setTimeout(() => {
//         $(".alert-msg").addClass("hidden");
//       }, 5000);
//         $form[0].reset();
//       } else if (!res.success) {
//         $(".validation-err").addClass("hidden");
//         $(".success-icon").addClass("hidden");
//         $(".error-icon").removeClass("hidden");
//         $(".alert-msg").removeClass("hidden bg-green-400").addClass("bg-red-400");
//         $(".alert-msg-text").text(res.message);
//          alertTimer = setTimeout(() => {
//         $(".alert-msg").addClass("hidden");
//       }, 5000);
//       }
//     }).fail( (jqXHR, textStatus, errorThrown) => {
//       console.error("AJAX request failed:", textStatus, errorThrown);
//       $(".alert-msg").removeClass("hidden").addClass("bg-red-400");
//       $(".alert-msg-text").text("Something went wrong, please try again later!");
//       alertTimer = setTimeout(() => {
//         $(".alert-msg").addClass("hidden");
//       }, 5000);
//     }).always(() => {
//       $sendMailBtn.prop('disabled', false).text('Send Message');
//     });
//   });

// // Close alert message
//   $(".alert-msg-close").click( (event) => {
//     event.preventDefault();
//     $(".alert-msg").addClass("hidden");
//   });
// });