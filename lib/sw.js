(function(){
  var cacheVersion = "20180517";
    var staticImageCacheName = "image" + cacheVersion;
    var staticAssetsCacheName = "assets" + cacheVersion;
    var contentCacheName = "content" + cacheVersion;
    var vendorCacheName = "vendor" + cacheVersion;
    var maxEntries = 100;
  const cacheList = [
  'http://127.0.0.1/build/usr/themes/Plain/images/commentsbg.gif',
  'http://127.0.0.1/build/usr/themes/Plain/images/github.png',
  'http://127.0.0.1/build/usr/themes/Plain/images/rss.png',
  'http://127.0.0.1/build/usr/themes/Plain/images/twitter.png',
  'http://127.0.0.1/build/usr/themes/Plain/style.min.css',
  'http://127.0.0.1/build/usr/themes/Plain/prism/prism.css',
  'http://127.0.0.1/build/usr/themes/Plain/prism/prism.js'
];
self.importScripts('http://127.0.0.1/build/usr/themes/Plain/lib/sw-toolbox.js');
self.toolbox.options.debug = true;

self.toolbox.precache(cacheList);
self.toolbox.router.get("http://127.0.0.1/build/usr/themes/Plain/images/(.*)", self.toolbox.cacheFirst, {
        cache: {
            name: staticImageCacheName,
            maxEntries: maxEntries
        }
    });

self.toolbox.router.get('http://127.0.0.1/build/usr/themes/Plain/prism/(.*)', self.toolbox.cacheFirst, {
        cache: {
            name: staticAssetsCacheName,
            maxEntries: maxEntries
        }
    });
self.toolbox.router.get("http://127.0.0.1/build/usr/themes/Plain/(.*)", self.toolbox.cacheFirst, {
        origin: /cdn\.bootcss\.com/,
        cache: {
            name: staticAssetsCacheName,
            maxEntries: maxEntries
        }
    });
self.toolbox.router.get('http://127.0.0.1/build/usr/themes/Plain/*', self.toolbox.networkFirst, {
        cache: {
            name: contentCacheName,
            maxEntries: maxEntries
        }
    });
    
    self.addEventListener("install", function(event) {
        return event.waitUntil(self.skipWaiting())
    });
    self.addEventListener("activate", function(event) {
        return event.waitUntil(self.clients.claim())
    })
})()