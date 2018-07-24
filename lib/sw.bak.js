const cacheVersion = "2018515";
const staticeCacheName = "static" + cacheVersion;
const cacheList = [
 'http://127.0.0.1/build/usr/themes/Plain/images/commentsbg.gif',
  'http://127.0.0.1/build/usr/themes/Plain/images/github.png',
  'http://127.0.0.1/build/usr/themes/Plain/images/rss.png',
  'http://127.0.0.1/build/usr/themes/Plain/images/twitter.png',
  'http://127.0.0.1/build/usr/themes/Plain/style.min.css',
  'http://127.0.0.1/build/usr/themes/Plain/prism/prism.css',
  'http://127.0.0.1/build/usr/themes/Plain/prism/prism.js'
];

self.addEventListener('install', function (event) {
  console.log('service worker: install');
  event.waitUntil(
    caches.open(staticeCacheName).then(function (cache) {
      return cache.addAll(cacheList);
    }).then(() => self.skipWaiting())
  );
});

self.addEventListener('activate', function (event) {
  console.log('service worker: activate');
  event.waitUntil(
    caches.keys().then(function (keyList) {
      return Promise.all(keyList.map(function (key) {
        if (staticeCacheName.indexOf(key) === -1) {
          return caches.delete(key);
        }
      }));
    })
  )
});

self.addEventListener('fetch', function (event) {
  console.log('service worker: fetch');
  event.respondWith(
    caches.match(event.request).then(function (resp) {
      return resp || fetch(event.request).then(function (response) {
        return caches.open('fetch').then(function (cache) {
          cache.put(event.request, response.clone());
          return response;
        })
      })
    }).catch(function () {
      return 0;
    })
  )
});
