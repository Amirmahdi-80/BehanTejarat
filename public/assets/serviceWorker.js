const staticCacheName = "BehanTejarat-static-v1.00";
const dynamicCacheName = "BehanTejarat-dynamic-v1.00";
const assets = [
  "/assets/css/AboutMe.css",
  "/assets/css/bootstrap.css",
  "/assets/css/Home.css",
  "/assets/css/Panel.css",
  "/assets/css/print.css",
  "/assets/css/signup.css",
  "/assets/css/app.css",
  "/assets/js/Amirmahdi.js",
  "/assets/js/appl2.js",
  "/assets/js/appl.js",
  "/assets/js/app2.js",
  "/assets/js/app3.js",
  "/assets/js/bootstrap.js",
  "/assets/js/bootstrap.min.js",
  "/assets/js/persian-date.min.js",
  "/assets/js/persian-datepicker.min.js",
  "/assets/js/popper.min.js",
  "/assets/js/Panel.js",
  "/assets/images/Amirmahdi.jpg",
  "/assets/images/AntiDDOS.png",
  "/assets/images/App.jpg",
  "/assets/images/Back.jpg",
  "/assets/images/Banner.jpg",
  "/assets/images/Bcrypt.png",
  "/assets/images/Car.png",
  "/assets/images/Cars.png",
  "/assets/images/Cars2.png",
  "/assets/images/Cost.png",
  "/assets/images/Driver.png",
  "/assets/images/EditUser.png",
  "/assets/images/EditUsers.png",
  "/assets/images/Emza.png",
  "/assets/images/favicon.png",
  "/assets/images/favicon2.png",
  "/assets/images/Forgot.jpg",
  "/assets/images/Indicator.png",
  "/assets/images/Favorite.png",
  "/assets/images/https.png",
  "/assets/images/InternalDomain.png",
  "/assets/images/Links.png",
  "/assets/images/Login.jpg",
  "/assets/images/Logo.png",
  "/assets/images/Logo144.png",
  "/assets/images/Logo196.png",
  "/assets/images/Logo512.png",
  "/assets/images/Logo72.png",
  "/assets/images/Namad.jpg",
  "/assets/images/Orders.png",
  "/assets/images/PanelBack.jpg",
  "/assets/images/Price.png",
  "/assets/images/PriceHome.png",
  "/assets/images/Provider.png",
  "/assets/images/Proving.png",
  "/assets/images/Register.jpg",
  "/assets/images/Report.png",
  "/assets/images/Resume.png",
  "/assets/images/Search.png",
  "/assets/images/Sign-up.png",
  "/assets/images/Slider.png",
  "/assets/images/SliderHome.png",
  "/assets/images/Soal.png",
  "/assets/images/Sort.png",
  "/assets/images/SortCost.png",
  "/assets/images/Tamin.png",
  "/assets/images/Tick.png",
  "/assets/images/Vahed.png",
  "/assets/images/VahedHome.png",
  "/assets/images/Welcome.jpg",
  "https://fonts.googleapis.com/icon?family=Material+Icons",
  "/assets/fallback.html",
  "/assets/fonts/Estedad-Bold.woff2",
  "/assets/fonts/Estedad-Bold.woff",
  "/assets/fonts/Estedad-Bold.ttf"
];

// Install Service Worker
self.addEventListener('install', evt => {
  console.log("Service Worker has been installed");
  evt.waitUntil(
    caches.open(staticCacheName).then(cache => {
      console.log("Caching assets");
      cache.addAll(assets);
    })
  );
});
// Active Service Worker
self.addEventListener("activate", evt => {
  console.log("Service Worker activated successfuly")
  evt.waitUntil(
    caches.keys().then(keys => {
      console.log(keys)
      return Promise.all(keys
        .filter(key => key !== staticCacheName && key !== dynamicCacheName)
        .map(key => caches.delete(key))
      )
    })
  );
});
// fetch Service Worker
// self.addEventListener('fetch', evt => {
//   console.log('fetch event', evt);
//   evt.respondWith(
//     caches.match(evt.request).then(cacheRes => {
//       return cacheRes || fetch(evt.request).then(fetchRes => {
//         // return caches.open(dynamicCacheName).then(cache => {
//         //   cache.put(evt.request.url, fetchRes.clone());
//         //   return fetchRes;
//         // })
//       });
//     }).catch(()=> caches.match('/assets/fallback.html'))
//   );
// });



// self.addEventListener("install", evt => {
//   evt.waitUntil(
//     caches.open(staticCacheName).then(cache => {
//         console.log("caching assets...");
//         cache.addAll(cacheAssets);
//       })
//       .catch(err => {})
//   );
// });
// // self.addEventListener("active",evt => {

// // })
self.addEventListener("fetch", evt => {
  evt.respondWith(
    caches
      .match(evt.request)
      .then(res => {
        return res || fetch(evt.request);
      })
      .catch(err => {
        if (evt.request.url.indexOf(".html") > -1) {
          return caches.match("fallback.html");
        }
      })
  );
});