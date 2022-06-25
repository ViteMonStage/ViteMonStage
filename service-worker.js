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

//On fetch le cache en premier, sinon on cherche la requête sur le réseau
self.addEventListener('fetch', (e) => {
  e.respondWith(
    caches.match(e.request).then((r) => { //On vérifie si la requête est déjà dans le cache
          console.log('[Service Worker] Récupération de la ressource: '+e.request.url);
          return r || fetch(e.request).then((response) => {  //Si on a déjà la ressource dans le cache, on l'affiche en priorité pour moins de chargement
          return caches.open(cacheName).then((cache) => {   //Sinon, on va aller chercher la ressource sur le web
            console.log('[Service Worker] Mise en cache de la nouvelle ressource: '+e.request.url); 
            cache.put(e.request, response.clone()); //On met à jour le cache avec les données du web
            return response; //On renvoit la réponse web
        }); 
      });
    })
  );
});