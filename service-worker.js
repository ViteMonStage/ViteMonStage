self.addEventListener('install', (e) => {
    console.log('[Service Worker] Installation');
});

var cacheName = 'js13kPWA-v1';
var appShellFiles = [
  '/js13kPWA-v1/PWA/LOGO2.png',
  '/js13kPWA-v1/index.html',
];

var gamesImages = [];
for(var i=0; i<games.length; i++) {
  gamesImages.push('data/img/'+games[i].slug+'.jpg');
}

var contentToCache = appShellFiles.concat(gamesImages);
self.addEventListener('install', (e) => {
  console.log('[Service Worker] Installation');
  e.waitUntil(
    caches.open(cacheName).then((cache) => {
          console.log('[Service Worker] Mise en cache globale: app shell et contenu');
      return cache.addAll(contentToCache);
    })
  );
});