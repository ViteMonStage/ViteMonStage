var cacheName = 'VMScache';
var appShellFiles = [
  '/index.php',
  '/stylesheets/index.scss',
  '/php/footer.php',
  '/php/navbar.php',
  '/offers_detail.php',
  '/offers.php',
  '/stylesheets/offers_detail.scss',
  '/stylesheets/offers.scss',
  '/stylesheets/global.scss',
  '/php/offer.php',
  '/php/offer_detail.php',
  '/controller/offers_detail.php',
  '/controller/offers.php'
];

//On précache les ressources essentielles (l'index, les fichiers concernant les offres)
self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[Service Worker VMS] Installation du Service Worker');
      return cache.addAll(appShellFiles); //On entre tous les fichiers tu tableau dans le cache
    })
  );
});


// On récupère la ressource depuis le network
const fromNetwork = (request, timeout) =>
  new Promise((fulfill, reject) => {
    const timeoutId = setTimeout(reject, timeout);
    fetch(request).then(response => {
      clearTimeout(timeoutId);
      fulfill(response);
      update(request);
    }, reject);
  });

// On récupère la ressource depuis le cache
const fromCache = request =>
  caches
    .open(cacheName)
    .then(cache =>
      cache
        .match(request)
        .then(matching => matching || cache.match('/index.php'))
    );

// On cache la ressource si on l'a eu sur le web
const update = request =>
  caches
    .open(cacheName)
    .then(cache =>
      fetch(request).then(response => cache.put(request, response))
    );


// On utilise les const créées dans le fetcher
self.addEventListener('fetch', evt => {
  evt.respondWith(
    fromNetwork(evt.request, 10000).catch(() => fromCache(evt.request)) // On cherche dans le réseau, si on trouve pas => on cherche dans le cache
  );
  evt.waitUntil(update(evt.request)); // On update le cache
});



