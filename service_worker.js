// Version your caches to update easily
const staticCache = "static-v1";
const dynamicCache = "dynamic-v1";

// Assets to pre-cache
const staticAssets = [
  "/",
  "/index.php",
  "/offline.php",
  "/manifest.json",
  "/dist/app.min.css",
  "/dist/app.min.js",
  "/dist/aos-JupvBk5m.js",
  "/dist/fonts/roboto_semibold.ttf",
  "/assets/icons/favicon.ico",
  "/assets/icons/icon_144x144.png",
  "/assets/icons/icon_152x152.png",
  "/assets/icons/icon_180x180.png",
  "/assets/icons/icon_167x167.png",
  "/assets/images/bio/web_development.webp",
  "/assets/images/bio/computer_maintenance.webp",
  "/assets/images/bio/digital_marketing.webp",
  "/assets/images/hero/coding.png",
  "/assets/images/my-skills/web-techniques/front-end/native/html.webp",
  "/assets/images/my-skills/web-techniques/front-end/native/css.webp",
  "/assets/images/my-skills/web-techniques/front-end/native/js.webp",
  "/assets/images/my-skills/web-techniques/front-end/tools_frameworks/sass.webp",
  "/assets/images/my-skills/web-techniques/front-end/tools_frameworks/bootstrap.webp",
  "/assets/images/my-skills/web-techniques/front-end/tools_frameworks/tailwind.webp",
  "/assets/images/my-skills/web-techniques/front-end/tools_frameworks/jquery.webp",
  "/assets/images/my-skills/web-techniques/front-end/tools_frameworks/vue.webp",
  "/assets/images/my-skills/web-techniques/front-end/tools_frameworks/gulp.webp",
  "/assets/images/my-skills/web-techniques/back-end/native/php.webp",
  "/assets/images/my-skills/web-techniques/back-end/native/mysql.webp",
  "/assets/images/my-skills/web-techniques/back-end/tools_frameworks/laravel.webp",
  "/assets/images/my-skills/web-techniques/back-end/tools_frameworks/firebase.webp",
  "/assets/images/my-skills/web-techniques/other/json.webp",
  "/assets/images/my-skills/web-techniques/other/api.webp",
  "/assets/images/my-skills/web-techniques/other/git.webp",
  "/assets/images/my-skills/web-techniques/other/github.webp",
  "/assets/images/my-skills/web-techniques/other/bash.webp",
  "/assets/images/my-skills/web-techniques/other/wordpress.webp",
  "/assets/images/my-skills/web-techniques/other/it.webp",
  "/assets/images/my-skills/web-techniques/other/windows.webp",
  "/assets/images/my-skills/web-techniques/other/linux.webp",
];

// Helper: limit cache size
const limitCacheSize = (name, size) => {
  caches.open(name).then(cache => {
    cache.keys().then(keys => {
      if (keys.length > size) {
        cache.delete(keys[0]).then(limitCacheSize(name, size));
      }
    });
  });
};

// Install event
self.addEventListener('install', evt => {
  //console.log('service worker installed');
  evt.waitUntil(
    caches.open(staticCache).then((cache) => {
      // console.log('caching shell assets');
      cache.addAll(staticAssets);
    })
  );
});

// Activate event
self.addEventListener('activate', evt => {
  //console.log('service worker activated');
  evt.waitUntil(
    caches.keys().then(keys => {
      //console.log(keys);
      return Promise.all(keys
        .filter(key => key !== staticCache && key !== dynamicCache)
        .map(key => caches.delete(key))
      );
    })
  );
});

// Fetch event
self.addEventListener('fetch', evt => {
  evt.respondWith(
    caches.match(evt.request).then(cacheRes => {
      return cacheRes || fetch(evt.request).then(fetchRes => {
        return caches.open(dynamicCache).then(cache => {
          cache.put(evt.request, fetchRes.clone());
          // check cached items size
          limitCacheSize(dynamicCache, 50);
          return fetchRes;
        })
      });
    }).catch(() => {
      // Offline fallback
      if (evt.request.mode === "navigate" || evt.request.destination === "document") {
        return caches.match('/offline.php');
      }
    })
  );
})