  <!-- App JS -->
  <script src="/dist/app.min.js" type="module" defer></script>
  <script>
    if ("serviceWorker" in navigator) {
      window.addEventListener("load", () => {
        navigator.serviceWorker
          .register("/service_worker.js")
        // .then((reg) => console.log("[SW] registered", reg))
        // .catch((err) => console.error("[SW] registration failed:", err));
      });
    }
  </script>

  </body>

  </html>