var cacheName = 'VMScache';
var appShellFiles = [
  '/index.php',
  '/stylesheets/index.scss',
  '/php/footer.php',
  '/php/navbar.php'
];

self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[Service Worker VMS] Installation du Service Worker');
      return cache.addAll(appShellFiles);
    })
  );
});

self.addEventListener("fetch", event => {
  // cache-First Strategy
  console.log('[Service Worker VMS] Fetch de la ressource');
  event.respondWith(
    caches
      .match(event.request) // check if the request has already been cached
      .then(cached => cached || fetch(event.request)) // otherwise request network
      .then(
        response =>
          cache(event.request, response) // put response in cache
            .then(() => response ) // resolve promise with the network response
      )
  );
});


self.addEventListener("activate", event => {
  // delete any unexpected caches
  event.waitUntil(
    caches
      .keys()
      .then(keys => keys.filter(key => key !== cacheName))
      .then(keys =>
        Promise.all(
          keys.map(key => {
            console.log(`[Service Worker VMS] Supression du cache ${key}`);
            return caches.delete(key);
          })
        )
      )
  );
});


function cache(request, response) {
  if (response.type === "error" || response.type === "opaque") {
    return Promise.resolve(); // do not put in cache network errors
  }

  return caches
    .open(cacheName)
    .then(cache => cache.put(request, response.clone()))
}